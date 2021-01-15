<?php
if ( is_plugin_active('advanced-custom-fields-pro/acf.php') ) {
    $bgNewsLetter = get_field('background_image', 'option');
    $titleNewsLetter = get_field('title', 'option');
    $formNewsLetter = get_field('form', 'option');
    $logos = get_field('images', 'option');
    $email = get_field('email', 'option');
    $phone = get_field('phone', 'option');
    $socials = get_field('socials', 'option');
    $copyright = get_field('copyright', 'option');
} else {
    $bgNewsLetter = null;
    $titleNewsLetter = null;
    $formNewsLetter = null;
    $logos = null;
    $email = null;
    $phone = null;
    $socials = null;
    $copyright = null;
}
?>
<footer>
    <?php if( $bgNewsLetter || $titleNewsLetter || $formNewsLetter ):?>
    <section class="news-letter" style="background: url(<?php echo $bgNewsLetter?>) repeat center bottom">
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
    <?php if($logos):?>
    <section class="logos">
        <?php foreach($logos as $logo):?>
            <img src="<?php echo $logo['image']?>" alt="logo">
        <?php endforeach;?>
    </section>
    <?php endif;?>
    <div class="bottom">
        <?php if($email):?>
        <div class="email">
            <a href="mailto:<?php echo $email?>"><i class="far fa-envelope"></i><?php echo $email?></a>
        </div>
        <?php endif;?>
        <?php if(!empty($socials)):?>
        <div class="socials">
            <ul>
                <?php foreach($socials as $item):
                    $host = parse_url($item['link']);
                    $domainName = explode('.',$host['host']);
                    if($domainName[0] == 'facebook') $domain = $domainName[0].'-f';
                    else $domain = $domainName[0];
                ?>
                <li>
                    <a href="<?php echo $item['link']?>" target="_blank">
                        <i class="fab fa-<?php echo $domain?>"></i>
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
        <?php endif;?>
        <?php if($phone):?>
        <div class="phone">
            <a href="tel:<?php echo $phone?>"><i class="fas fa-phone-alt"></i><?php echo $phone?></a>
        </div>
        <?php endif;?>
    </div>
    <?php if($copyright):?>
    <div class="copyright"><?php echo $copyright?></div>
    <?php endif;?>
</footer>
</div> <!-- div.wrapper -->
<?php wp_footer();?>
</body>
</html>