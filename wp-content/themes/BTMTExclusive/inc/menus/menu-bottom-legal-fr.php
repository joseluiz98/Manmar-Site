<?php 
wp_nav_menu(
    array(
        'menu' => 'menu-bottom-legal-fr',
        'depth' => 2,
        //'menu_class'=> 'nav navbar-nav navbar-right',
        'walker' => new wp_bootstrap_navwalker()
    )
);
?>