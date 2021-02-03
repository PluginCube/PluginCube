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
				<img src="<?= get_template_directory_uri() ?>/assets/dist/img/logo.png" alt="<?= get_bloginfo() ?>">
			</a>

			<?php
				wp_nav_menu([
					'theme_location' => 'primary',
					'container' => 'nav',
				]);
			?>
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
					<a href="#">Get Started</a>
				</li>
			</ul>
		</div>
	</div>
</header>

<main role="main">