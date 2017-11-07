<?php get_header(); the_post();

$img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
?>

<section id="internas">
    <div class="row">
        <div class="col-md-12">
            <div class="mask">
                <div class="imgEventGalerie">
                    <img class="sgallerie" src="<?php echo get_template_directory_uri() ?>/dist/imgs/banner_pequeno.png" alt="">
                </div>
                <div class="mask-hover">
                    <div class="col-md-6 col-md-offset-3 title-page">
                        <p><?php the_title(); ?></p>
                        <h1><?php echo $title_highlight ; ?></h1>
                    </div>
                    <div class="col-md-4 col-md-offset-4 title-page">
                        <nav class="iconsMedia">
                            <ul class="nav navbar-nav">
                                <li><a id="a_menos" class="diminuir" href="#"><span class="rp-minus"></span></a></li>
                                <li><a id="a_mais" class="aumentar" href="#"><span class="rp-plus"></span></a></li>
                                <li><a id="contraste" href="#" onclick="setActiveStyleSheet('normal'); return false;"><span class="rp-contrast"></span></a></li>
                                <li><a id="contrasteOne" href="#" onclick="setActiveStyleSheet('contraste'); return false;"class=""style="display:none;"><span class="rp-contrast"></span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="blogView">
	<div class="row">
        <div class="container">
            <div class="col-sm-8 blog-main">

                <div class="blog-post">

                    <div class="col-md-12 post-title">

                        <h2 class="blog-post-title"><?php the_title(); ?></h2>
                    </div>

                    <!-- <div class="col-md-2 post-date">
                        <div class="post-date-day">
                           <?php the_time('d') ?>              
                        </div>
                        <div class="col-md-10 post-date-month">
                           <?php the_time('F') ?>                
                        </div>
                    </div>
 -->
                    <div class="col-md-12 post-text">

                        <?php the_post_thumbnail(); ?>
                        <p class="post-date"><?php the_time('j \d\e F \d\e Y') ?></p>
                        <?php the_content(); ?>

                        <div class="post-tags">
                            <p>
                                Tags: 
                                <?php 
                                $posttags = get_the_tags();
                                if ($posttags):
                                    foreach($posttags as $tag):
                                        echo $tag->name . ' '; 
                                    endforeach;
                                endif; 
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-md-3 col-md-offset-1">
                <div class="col-md-12" id="about">

                    <h4>Sobre</h4>

                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut</p>

                    <ul class="">
                        <li><a href="https://www.facebook.com/RodrigoPachecoBH" target="_blank" alt="Facebbok" title="Facebbok"><span class='rp-facebook'></span></a></li>
                        <li><a href="https://www.instagram.com/rodrigopachecobh/" target="_blank" alt="Instagram" title="Instagram"><span class='rp-instagram'></span></a></li>
                        <li><a href="https://twitter.com/rodrigo15bh" target="_blank" alt="Twitter" title="Twitter"><span class='rp-twitter'></span></a></li>
                        <li><a href="https://www.youtube.com/channel/UC8z2NYOucY0W3Fxk_oT2P8Q" target="_blank" alt="Youtube" title="Youtube"><span class='rp-youtube'></span></a></li>
                    </ul>
                </div>

                <div class="col-md-12" id="lastNews">
                    <h4>Últimas Notícias</h4>
                    <ul>
                        <li><a class="twitter-timeline"  href="https://twitter.com/rodrigo15bh">Tweets by @rodrigo15bh</a></li>
                        <!-- <li><a href="#" target="_blank">Managing Your Time In 3</a></li>
                        <li><a href="#" target="_blank">Erik Qualman</a></li> -->
                    </ul> 
                </div>

            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>