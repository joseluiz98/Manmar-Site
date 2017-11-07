<?php 
wp_nav_menu(
    array(
        'menu' => 'menu-top-portuguese',
        'depth' => 2,
        'menu_class'=> 'nav navbar-nav navbar-right',
        'walker' => new wp_bootstrap_navwalker()
    )
);
?>