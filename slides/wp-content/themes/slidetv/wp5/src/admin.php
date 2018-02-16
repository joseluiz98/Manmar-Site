<?php

class Admin {

    public function init() {

        add_action('admin_menu', array(&$this, "setDefaultMenu"));

        add_action('admin_head', array(&$this, 'setAdminHead'));

        add_filter('gettext', array(&$this, 'setTitlePost'));
        add_filter('ngettext', array(&$this, 'setTitlePost'));
    }

    function setTitlePost($translated) {

        $translated = str_ireplace('Post', 'Notícia', $translated);

        return $translated;
    }

    public function setDefaultMenu() {

        //remove_menu_page("upload.php");
        remove_menu_page("link-manager.php");
        remove_menu_page("edit-comments.php");
    }

    public function setAdminHead() {
        //garante o carregamento das bibliotecas js sem que fiquem duplicadas
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-datepicker', get_bloginfo("stylesheet_directory") . '/wp5/js/jquery-ui-1.10.1.custom.min.js', array('jquery', 'jquery-ui-core'));
        ?>
        <link href="<?php bloginfo("stylesheet_directory"); ?>/wp5/css/smoothness/jquery-ui-1.8.21.custom.css" type="text/css" rel="stylesheet" /> 
        <script src="<?php bloginfo("stylesheet_directory");  ?>/wp5/js/script.php" type="text/javascript"></script>

        <?php
    }

}
?>
