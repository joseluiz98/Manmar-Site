<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<div class="SearchItemCore">
	<div id="post-<?php the_ID(); ?>" class="SearchItemInner">
		<div class="entry-content">
			<?php the_content(__('Continue reading', 'example')); ?>
			<?php wp_link_pages('before=<p class="pages">' . __('Pages:','example') . '&after=</p>'); ?>
		</div>
	</div>
		<p class="entry-meta">
			<a href="<?php the_permalink() ?>">Read More</a>
		</p>	
	</div>
	<?php endwhile; ?>
<?php else : ?>
	<p class="no-posts"><?php _e('Sorry, no posts matched your criteria', 'example'); ?></p>
<?php endif; ?>