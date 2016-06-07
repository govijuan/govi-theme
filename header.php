<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title><?php bloginfo('title')?></title>
		<link rel="icon" 
      type="image/png" 
      href="<?php echo get_option('govi_favicon'); ?>">
		    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>"/>
		<?php wp_head()?>
	</head>
	<body>
	
		<header>
			<div class="centered-980">
				<a href="<?php echo home_url('/')?>"><img src="<?php echo get_option('govi_logo');?>" class="logo-img" /></a>
				
				<nav>
				<?php wp_nav_menu();?>
				</nav>
			</div>
			
		</header>
		<div id="container">