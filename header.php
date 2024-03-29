<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
	<title>A Laconic Writer</title>
</head>
<body>
	<div id="slideout-menu">
		<ul>
			<li><a href="<?php echo site_url(''); ?>" <?php if(is_front_page()) echo 'class="active"'?> >Home</a></li>
			<li><a href="<?php echo site_url('/blog'); ?>" <?php if(get_post_type() == 'post') echo 'class="active"'?> >Blog</a></li>
			<li><a href="<?php echo site_url('/gallery'); ?>" <?php if(get_post_type() == 'gallery') echo 'class="active"'?> >Gallery</a></li>
			<li><a href="<?php echo site_url('/about'); ?>" <?php if(is_page('about')) echo 'class="active"'?> >About</a></li>
			<div class="searchbox-slide-menu">
				<?php get_search_form(); ?>
			</div>
		</ul>
	</div>
	<nav>
		<div id="logo-img">
			<a href="<?php echo site_url(''); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/images/mifra-logo.png" alt="Laconic Writer">
			</a>
		</div>
		<div id="menu-icon">
			<i class="fa fa-bars" aria-hidden="true"></i>
		</div>
		<ul class="menu-list">
			<li><a href="<?php echo site_url(''); ?>" <?php if(is_front_page()) echo 'class="active"'?> >Home</a></li>
			<li><a href="<?php echo site_url('/blog'); ?>" <?php if(get_post_type() == 'post') echo 'class="active"'?> >Blog</a></li>
			<li><a href="<?php echo site_url('/gallery'); ?>" <?php if(get_post_type() == 'gallery') echo 'class="active"'?> >Gallery</a></li>
			<li><a href="<?php echo site_url('/about'); ?>" <?php if(is_page('about')) echo 'class="active"'?> >About</a></li>
			<li><div id="search-icon"><i class="fa fa-search "></i></div></li>
		</ul>
	</nav>
	<div id="searchbox">
		<?php get_search_form(); ?>
	</div>
	<?php
	if(!is_front_page()){ ?>
		<main>
		<?php } ?>
		<?php// echo wpse8170_loop() ?>