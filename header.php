<!DOCTYPE html>
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
<header class="nav-wrap bg-dark fixed-top">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark px-lg-0">
			<a class="navbar-brand" href="<?= home_url() ?>">
                <?= get_bloginfo() ?>
            </a>

			<div class="collapse navbar-collapse justify-content-between">
				<?php
					wp_nav_menu([
						'theme_location'  => 'primary',
						'depth'           => 2,
						'container'       => 'ul',
						'menu_class'      => 'navbar-nav',
					]);
				?>

				<ul class="navbar-nav">
					<li class="nav-item swap-link">
						<a class="nav-link" href="<?= get_option('cp_user_login_url') ?? null ?>">
							<i class="las la-user mr-2" style="font-size:20px;"></i>
						</a>
					</li>

					<li class="nav-item swap-link">
						<a class="nav-link no-arrow btn btn-primary swap-link text-white" href="#">Get the Plugin</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>
