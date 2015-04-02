<?php
	
add_action("wp_ajax_directory_create", "directory_create");
add_action("wp_ajax_nopriv_directory_create", "directory_create");

function directory_create(){
	
	global $user, $dircore;
	foreach($_REQUEST as $k=>$v) $params[$k] = $v;
		

	// Nonce check
	if ( !wp_verify_nonce( $params['nonce'], 'directory_create_nonce')) {
      exit('You are not authorised to take this action');
	}
	
	
	// extract encrypted new item vars
	if($params['encrypted']){
		global $dircore;
		parse_str($dircore->decrypt($params['encrypted']),$safeparams);
		$params = array_merge($params,$safeparams);
	} 
	
	
	// insert new post with data
	$newitem = array(	'post_type' => $params['type'],
						'post_title' => $params[POSTTITLEFIELD],
						'post_status' => 'publish'
					);
							
	$newitem['post_author'] = $result['post_author'] = $user ? $user->ID : 0;
	$newitemID = wp_insert_post($newitem,true);
	
	
	// Error if item not created correctly
	if(is_wp_error($newitemID)){
    	header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	

	// get correct class instance, get expected vars
	$type = $params['type'];
	global $$type;
	$varnames = $$type->getVarNames();

		
	// iterate through params and create post meta as appropriate
	foreach($varnames as $var){
		if($params[$var]){
			update_post_meta($newitemID,$var,$params[$var]);
			$result[$var] = $params[$var];
		}
		$q = $$type->getQuestion($var);
		if($q['altfields']){
			foreach(explode(',', $q['altfields']) as $field){
				$result[$field] = $params[$var];
			}
		}
	}
	
	
	// add search_count to item
	update_post_meta($newitemID,'search_count',0);
	
	
	// Send notification of item creation to supplied email
	if($params['notify']){
		$dircore->notify($params);
		$result['notifyuser'] = $params['notify'];
	}
	
		
	// post-submission behaviour
	$result['formafter'] = $params['formafter'];
	
	
	// If no logged in user, create cookie with $_REQUEST for registration prompt
	// unli = User Not Logged In
	if(!$user) {
		setcookie('allivion_unli',json_encode($result),time()+3600);
	}

	
	// Form submitted by AJAX
	if($_SERVER['HTTP_X_REQUESTED_WITH'] && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$result['result'] = 'success';
		if($params['success_message']){
			$result['message'] = $params['success_message'];
		}

		if($params['redirect']){
			$result['redirect'] = $params['redirect'].'?i='.$newitemID.'&u='.$result['post_author'];
		}
		echo json_encode($result);
		
	
	// Form submitted by HTTP
	} else {
		if($params['redirect']){
			header('Location: '.$params['redirect'].'?i='.$newitemID.'&u='.$result['post_author']);
		} else {
			header('Location: '.$_SERVER['HTTP_REFERER'].'?u='.$result['post_author']);
		}
	}
		
	die();
	
}


add_action( 'init', 'directory_create_enqueue' );

function directory_create_enqueue() {
   wp_register_script( 'directory_create', WP_PLUGIN_URL.'/ibe-directory/js/directory_create.js', array('jquery') );
   wp_localize_script( 'directory_create', 'directory_create', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        
   wp_enqueue_script( 'directory_create' );
}