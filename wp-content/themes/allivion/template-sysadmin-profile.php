<?php

/*
Template Name: Sysadmin recruiter profile
*/

$dircore->canAccess(array('roles' => 'administrator'));
	
get_template_part('header','sysadmin');

$vals = $_REQUEST['i'] ? $recruiter_admin->getVals($_REQUEST['i']) : null;
//echo '<pre>'; print_r($usermeta); echo '</pre>';

	
while (have_posts()) { 
		the_post();
		the_content();


/////////////////////////////////////////////
//
// Page config
//
/////////////////////////////////////////////

// Fields to be shown in search results



/////////////////////////////////////////////
//
// End Page config
//
/////////////////////////////////////////////

$this_user = get_user_by('id',$_REQUEST['i']);
$usercustom = get_user_meta($_REQUEST['i']);
foreach($usercustom as $k=>$v){
	$this_usermeta[$k] = $v[0];
}

//echo '<pre>'; print_r($usermeta); echo '</pre>';

?>

<div class="section">
	<div class="stage">
		
		<h1 class="purple"><?php the_title(); ?></h1>
		
			<form class="directory <?php echo $recruiter_admin->role; ?>" id="updateprofile" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post" enctype= "multipart/form-data">
		<input type="submit" value="Save changes" />
			
				<div class="halfcol">

				
					<input type="hidden" name="nonce" value="<?php echo wp_create_nonce("directory_update_user_nonce"); ?>" />
 					<input type="hidden" name="action" value="directory_update_user" />
 					<input type="hidden" name="redirect" value="<?php echo DIRECTORY_RECADMIN; ?>" />
 					<input type="hidden" name="role" value="<?php echo $user->roles[0]; ?>" />
 					<input type="hidden" name="origin" value="updateprofile" />
 		

					<div class="qpanel">
						<?php $recruiter_admin->printQuestion('recruiter_name',$vals['recruiter_name']); ?>
						
						<?php if($usermeta['logo']) foreach(unserialize($vals['logo']) as $image_id) echo wp_get_attachment_image($image_id); ?>
					
						<?php $recruiter_admin->printQuestion('logo',$vals['logo']); ?>
						<?php $recruiter_admin->printQuestion('boilerplate',$vals['boilerplate']); ?>
						<div class="clear"></div>
					</div>
					
				
				</div>
				
				<div class="halfcol">
					<div class="qpanel">
						<?php $recruiter_admin->printQuestion('user_email',$user->user_email); ?>
						<?php $recruiter_admin->printQuestion('contact_phone',$vals['contact_phone']); ?>
						<?php $recruiter_admin->printQuestion('default_app_email',$vals['default_app_email']); ?>
					</div>
				</div>
				
				<?php if($user->roles[0] == 'administrator') { ?>
					<div class="qpanel">
						<?php $recruiter_admin->printQuestion('subscriber',$vals['subscriber']); ?>							
					</div>
				<?php } ?>

				
			</form>

			
			<div class="clear"></div>

			<?php
				if($_SESSION){ 
					foreach($_SESSION['errors'] as $error) { echo '<p class="formerror">'.$error.'</p>'; }
					session_unset();
				}
			?>
			
			
		
		<div class="clear"></div>
		
	</div>
</div>

<?php } get_footer(); ?>