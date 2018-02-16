<?php get_header(); the_post(); 
/*
Template Name: 404
*/
?>
<section id="notFound" class="interns">
    <div class="container">
        <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 content-blog">
            <header>
                <h2><?php the_title(); ?></h2>
            </header>
        </div>
    	<section class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 content-blog error-404 not-found">
			<header>
				<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.'); ?></h1>
			</header>
			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?'); ?></p>

				<?php get_search_form(); ?>

			</div>
		</section>
    </div>
</section>
<?php get_footer();