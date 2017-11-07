<?php

class ConfigPanel {

    public function ConfigPanel() {

        add_action('admin_menu', array(&$this, "createMenuPage"));

        add_action("admin_head", array(&$this, "setConfigPanelHead"));
    }

    public function createMenuPage() {

        add_menu_page('Opções RP', 'Opções RP', 'manage_options', 'RP-options', array(&$this, 'loadOptionsPage'), null, 25);
        add_action('admin_init', array(&$this, 'registerOptionsSettings'));
    }

    public function loadOptionsPage() {

        require_once('options_page.php');
    }
	

    public function setConfigPanelHead() {
	   ?>
        <link href="<?php bloginfo("stylesheet_directory"); ?>/config_panel/css/config_panel.css" type="text/css" rel="stylesheet" />
        <script src="<?php bloginfo("stylesheet_directory"); ?>/config_panel/js/function.php" type="text/javascript"></script>
        <?php
    }

     public function registerOptionsSettings() {
        $fields = array(
            "analytics_code",
            "phone",
            "whatsapp",
            "address",
            "district",
            "city",
            "cep",
            "email_public",
            "email_one",
            "email_two",
            "email_three",
        );

        foreach ($fields as $field) {
            register_setting("options-group", $field);
        }


        register_setting("options-group", "list-mult", array(&$this, "saveListMult"));
    }

    public function saveListMult($list) {

        return json_encode($list);
    }

}
?>