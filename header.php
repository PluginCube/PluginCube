<!DOCTYPE html>

<!-- HTML -->
<html class="no-js" <?php language_attributes(); ?>>

<!-- Head -->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<!-- Body -->
<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

<?php wp_body_open(); ?>

<!-- Header -->
<header class="header">
	<div class="container d-flex justify-content-between align-items-center">
		<div class="primary d-flex align-items-center">
			<a class="navbar-brand" href="<?= home_url() ?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="22" height="39" viewBox="0 0 25.4 44">
					<path d="M0,7.33V36.67H0l6.35,3.66L12.7,44V29.33l6.35-3.66L25.4,22V7.33L19.05,3.67,12.7,0,6.35,3.67Zm12.7,17.9V14.67h0L6.35,11,3.55,9.38,8.13,6.74,12.7,4.1l4.58,2.64,4.57,2.64V20l-4.57,2.64Z"/>
				</svg>
			</a>

			<span class="separator"></span>

			<nav>
				<a class="navbar-brand mobile-menu-only" href="<?= home_url() ?>">
					<img src="<?= get_template_directory_uri() ?>/assets/dist/img/logo.svg" alt="<?= get_bloginfo() ?>">
				</a>

				<?php
					wp_nav_menu([
						'theme_location' => 'primary',
						'container' => false,
					]);
				?>
			</nav>
		</div>

		<div class="secondary d-flex align-items-center">
			<ul class="menu">
				<?php
					wp_nav_menu([
						'theme_location'  => 'secondary',
						'container'       => false,
						'items_wrap' => '%3$s'
					]);
				?>

				<li class="header-btn">
					<a href="#">Download</a>
				</li>
			</ul>

			<div class="burger-icon">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="19" height="19">
					<path fill="none" d="M0 0h24v24H0z"/>
					<path d="M3 4h18v2H3V4zm0 7h18v2H3v-2zm0 7h18v2H3v-2z"/>
				</svg>
			</div>
		</div>
	</div>
</header>

<main role="main">
