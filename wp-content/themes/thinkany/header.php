<!DOCTYPE html>
<html lang="en">
<?php 
	$favicon  = get_field( 'favicon', 'options' );
	$sitelogo = get_field( 'site_logo', 'options' );
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="apple-mobile-web-app-capable" content="yes" />

	<?php if ( $favicon == null ) : ?>
		<link rel="icon" type="image/png" href="<?= get_template_directory_uri() . '/assets/images/fav/favicon-32x32.png' ?>">
	<?php else : ?>
		<link rel="icon" type="image/png" href="<?= $favicon['url']; ?>">
	<?php endif; ?>

  <meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="apple-mobile-web-app-capable" content="yes" />
	
  <link rel="preload" as="style" href="<?= get_template_directory_uri() . '/assets/css/_dist/styles.css' ?>" />
	<link rel="preload" as="script" href="<?= get_template_directory_uri() . '/assets/js/_dist/jquery-3.6.min.js' ?>" />
	<link rel="preload" as="script" href="<?= get_template_directory_uri() . '/assets/js/_dist/'.SITE_NAME.'.min.js' ?>" />

  <title><?php wp_title(); ?></title>

  <?= the_field( 'head_script', 'options' ); ?>

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?= get_field( 'body_script', 'options' ); ?>
<div id="header-tracker"></div>

  <header id="main-header">
    <nav class="container">
      
      <div class="wrapper flex flex-ai-c">

        <a href="/" class="link-home flex flex-inline flex-ai-c flex-jc-fs"></a>
        <div class="wrapper-menu">

          <?php
            wp_nav_menu(
              array(
                'menu' => '',
                'menu_class' => 'menu-main-nav flex flex-ai-c',
                'container'=> false,
                'theme_location' => 'main-menu'
              )
            ); 
          ?>

        </div>

      </div>

    </nav>
    <div class="mobile-ham">
      <span></span>
    </div>
  </header>

  <main id="main-content-area">
    
    