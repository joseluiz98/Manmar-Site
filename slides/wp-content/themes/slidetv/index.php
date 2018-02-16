<?php get_header(); 
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => -1,
      'orderby' => 'menu_order'
    );
    $query = new WP_query ($args);
?>
<div class="owl-carousel owl-theme">
    <?php
        while ($query->have_posts()): $query->the_post();
            $img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            $slug = get_post_field('post_name', get_post());
            $taxa = get_post_meta(get_the_ID(),'taxa',true);
            $moeda_1 = get_post_meta(get_the_ID(),'moeda_1',true);
            $moeda_2 = get_post_meta(get_the_ID(),'moeda_2',true);
            $type = get_post_meta(get_the_ID(),'tipo_post',true);
            if($type == 'Câmbio'):
                ?>
                <div class="itens">
                    <div class="contentData">
                        <div class="flag">
                            <img src="<?php echo $img; ?>" alt="" style="background-size: cover;height:80vh;">
                        </div>
                    </div>
                    <div class="contentExchange">
                        <div class="exchange">
                            <div>
                                <p><span><?php echo $moeda_1; ?></span> = <span><?php echo $moeda_2; ?></span>  <?php echo $taxa; ?></p>
                            </div>
                        </div>
                        <div class="country">
                            <h2><?php the_title(); ?></h2>
                        </div>
                        <div class="logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/logo-bt.png" alt="">
                        </div>
                    </div>
                </div>
                <?php 
            else: 
                ?>
                <div class="itens">
                    <div class="content-partners" style="">
                        <div>
                            <img src="<?php echo $img; ?>" alt="">
                        </div>
                    </div>
                </div>
                <?php
            endif;
        endwhile;
    wp_reset_postdata(); 
    ?>
</div>
<?php get_footer(); ?>