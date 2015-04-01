<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">	
	
	<?php
	if ( is_tag() ) { echo "<meta name=\"robots\" content=\"noindex,follow\">"; }
	elseif ( is_archive() ) { echo "<meta name=\"robots\" content=\"noindex,follow\">"; }
	elseif ( is_search() ) { echo "<meta name=\"robots\" content=\"noindex,follow\">"; }
	elseif ( is_paged() ) { echo "<meta name=\"robots\" content=\"noindex,follow\">"; }
	else { echo "<meta name=\"robots\" content=\"index,follow\">"; }
	?>
	
	<title></title>
	
	<link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/favicon.ico" />

	<link rel="stylesheet" media="screen" href="<?php bloginfo('template_url') ?>/style.css" />
	<link rel="stylesheet" media="screen" href="<?php bloginfo('template_url') ?>/css/layout.css" />
	<link rel="stylesheet" media="screen" href="<?php bloginfo('template_url') ?>/css/textstyles.css" />
	<link rel="stylesheet" media="screen" href="<?php bloginfo('template_url') ?>/css/nav.css" />
	

	
	<?php wp_head(); ?>
	
	<?php global $user, $usermeta; 
		if($user) { ?>
			<style>
				.loggedinshow{display:inherit;}
				.loggedinhide{display:none;}
			</style>
		<?php } else { ?>
			<style>
				.loggedinshow{display:none;}
				.loggedinhide{display:inherit;}
			</style>
		<?php } ?> 

</head>

<body <?php body_class(); ?>>
	
	<?php require_once(TEMPLATEPATH.'/includes/login_form.php'); ?>
	
		<div class="section" id="navigation">
			<div class="stage">
				<nav id="main">
					<?php wp_nav_menu('theme_location=main'); ?>
				</nav>
				<?php if($user) echo '<p class="">Logged in as '.$user->display_name.'</p>'; ?>
					
			</div>
		</div>
		
		<div class="section" id="header">
			<div class="stage">
				<a href="/">
					<img src="<?php bloginfo('template_url'); ?>/img/logo.png" id="logo" />
				</a>
			</div>
		</div>
		