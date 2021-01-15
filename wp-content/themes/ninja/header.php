<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active('advanced-custom-fields-pro/acf.php') ) {
	$fav = get_field('favicon', 'option');
	$logo = get_field('logo', 'option');
    $bgNewsLetter = get_field('background_image', 'option');
    $titleNewsLetter = get_field('title', 'option');
    $formNewsLetter = get_field('form', 'option');
} else {
    $fav = null;
	$logo = null;
    $bgNewsLetter = null;
    $titleNewsLetter = null;
    $formNewsLetter = null;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?= $fav ?>">
    <link rel="apple-touch-icon" href="<?= $fav ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= $fav ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= $fav ?>">
	<?php wp_head();?>
</head>
<body <?php body_class();?>>
<div class="mobile-menu">
    <div class="wrap">
        <div class="mobile-logo">
            <?php if(!empty($logo)): ?>
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo $logo ?>" alt="logo">
                </a>
            <?php endif; ?>
        </div>
        <div class="close-menu">
            <span class="span1"></span>
            <span class="span2"></span>
        </div>
        <?php wp_nav_menu(['theme_location'  => 'main-menu-left']); ?>
        <?php wp_nav_menu(['theme_location'  => 'main-menu-right']); ?>
    </div>
</div>
<?php if( $bgNewsLetter || $titleNewsLetter || $formNewsLetter ):?>
    <section class="news-letter" style="background: url(<?php echo $bgNewsLetter?>) repeat center bottom">
        <div class="close-menu">
            <span class="span1"></span>
            <span class="span2"></span>
        </div>
        <h2><?php echo $titleNewsLetter?></h2>
        <?php if($formNewsLetter):?>
            <div class="news-letter-form">
                <form class="subscribe" method="post" action="" novalidate>
                    <input type="email" placeholder="email address">
                    <button>Subscribe</button>
                </form>
                <div class="msg"></div>
            </div>
        <?php endif;?>
    </section>
<?php endif;?>
<div class="wrapper">
    <header>
        <div class="wrap">
            <div class="desktop-menu">
                <div class="toggle">
                    <span class="span1"></span>
                    <span class="span2"></span>
                    <span class="span3"></span>
                </div>
                <?php wp_nav_menu(['theme_location'  => 'main-menu-left']); ?>
                <div class="desktop-logo">
                <?php if(!empty($logo)): ?>
                    <a href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo $logo ?>" alt="logo">
                    </a>
                <?php endif; ?>
                </div>
                <?php wp_nav_menu(['theme_location'  => 'main-menu-right']); ?>
                <div class="newsletter-popup">
                    <i class="far fa-envelope"></i>
                </div>
            </div>
        </div>
    </header>

