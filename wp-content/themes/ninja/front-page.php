<?php
get_header();
global $post;
$ID = $post->ID;
$fields = get_fields($ID);
$sections = $fields['sections'];
?>
@if(get_the_content())
<section class="top-title">
    <h1>{!! get_the_content() !!}</h1>
</section>
@endif
@if ( !empty( $sections ) )
<?php
$total = count($sections);
$count = 0;
$number = 2;
?>
<section class="blocks">
    <div class="block-wrap">
    <?php foreach ( $sections as $section ) :
        if ( $section["acf_fc_layout"] == "blocks" ) :
            if($section['background_image'] == "yes") : ?>
                <div class="bg-image">
                    <img src="<?php echo $section['image']; ?>" alt="image">
                </div>
            <?php endif; ?>
            <div class="block">
            <?php if(!empty($section['item'])) :
                foreach($section['item'] as $item) : ?>
                    <div class="item" style="background-color: <?php echo $item['background_color']; ?>">
                        <p><?php echo $item['text']; ?></p>
                        <strong>— <?php echo $item['title']; ?></strong>
                    </div>
                <?php endforeach;
            endif; ?>
            </div>
            <?php if ($count == $number) : break; endif; $count++;
        endif;
    endforeach;?>
    </div>
    <button class="more" <?php if ($total < $count) : ?> style="display: none;" <?php endif;?>>Load more</button>
</section>

@endif

<!--@foreach(ninjaPosts(['product'],['publish','draft']) as $pr)
    {{ dump($pr->post_title) }}
@endforeach-->

<?php //wp_reset_postdata();?>

<?php
//$ins = ninjaInsert('ninja_dev', ['first_name' => 'koko', 'last_name' => 'jambo', 'email' => 'info@myninjadev.com', 'address' => 'melkumov']);
//$res = ninjaSelect('ninja_dev', '*','','1');
//$upd = ninjaUpdate('ninja_dev', [ 'first_name'=>'qweqweqwe','address'=>'cdevfrbgt' ], [ 'ID'=>2 ]);
?>


<?php get_footer();?>
