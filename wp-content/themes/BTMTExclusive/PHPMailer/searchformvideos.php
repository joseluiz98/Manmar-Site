<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">

    <input class="search-input" type="search" name="s" value="<?php echo get_search_query() ?>" placeholder="Pequisar" required>

    <!-- <input type="search" class="search-field" placeholder="<?php //echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php //echo get_search_query() ?>" name="s" title="<?php //echo esc_attr_x( 'Search for:', 'label' ) ?>" /> -->
    

    <input type="hidden" name="post_type" value="videos" />
    
    <!-- <input type="submit" class="search-submit" value="<?php //echo esc_attr_x( 'Search', 'submit button' ) ?>" /> -->

    <button class="search-submit" type="submit" role="button"><img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/search.svg" alt="Pesquisar"></button>
</form>