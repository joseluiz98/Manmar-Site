<?php

class Agendas {

    public function Agendas() {

        $this->createCustomPostType();
    }

    public function getAllAgendas($options = array()) {

        $args = array("post_type" => "agendas", "orderby" => "title", "order" => "ASC", "posts_per_page" => -1); 

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function createCustomPostType() {

        register_post_type('agendas', array(
            'label' => 'Agendas',
            'description' => 'Cadastro de Agendas',
            'public' => true,
            'exclude_from_search' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'agenda'),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory") . '/wp5/img/icon-events.png',
            'labels' => array(
                'name' => 'Agendas',
                'singular_name' => 'Agenda',
                'menu_name' => 'Agendas',
                'add_new' => 'Nova Agenda',
                'add_new_item' => 'Novo Agenda',
                'edit' => 'Editar',
                'edit_item' => 'Editar Agenda',
                'new_item' => 'Nova Agenda',
                'view' => 'Ver Agenda',
                'view_item' => 'Ver Agenda',
                'search_items' => 'Buscar Agendas',
                'not_found' => 'No Agendas Found',
                'not_found_in_trash' => 'No Agendas Found in Trash',
                'parent' => 'Parent Agenda',
            ),
        ));

        add_filter('manage_edit-agendas_columns', array(&$this, "manageCustomColumn"));
        add_action('manage_agendas_posts_custom_column', array(&$this, "manageCustomColumnContent"), 10, 2);
        add_action('add_meta_boxes', array(&$this, 'addCustomFields'));
        add_action('save_post', array(&$this, 'saveCustomFields'));
    }

    public function manageCustomColumn($columns) {

        unset($columns["date"]);

        $columns["unit"] = "Unidade";
        $columns["date"] = "Data";

        return $columns;
    }

    public function manageCustomColumnContent($column, $post_id) {

        if ($column == "unit") {
            $unit_id = get_post_meta($post_id, "unit_agenda", true);
            if ($unit_id != "") {
                echo get_the_title($unit_id);
            } else {
                echo "";
            }
        }
    }

    public function addCustomFields() {

        add_meta_box("agendasCustomFields", "Datas da agenda", array(&$this, "formCustomFields"), "agendas", "normal", "low");
    }

    public function formCustomFields() {

        global $post;

        $data = get_post_custom($post->ID);
        
        $current_user = wp_get_current_user();

        //$date_start = (isset($data["date_start"])) ? $data["date_start"][0] : '';

        //$date_end = (isset($data["date_end"])) ? $data["date_end"][0] : '';

        $dateAgenda = (isset($data["dateAgenda"])) ? $data["dateAgenda"][0] : '';

        wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

        $agendas = agendas::getAllagendas();
        
        $unit_args = array();
        $unit_profile = get_user_meta($current_user->data->ID,"unit_profile",true);
        if(isset($current_user->caps['marketing']) && ($current_user->caps['marketing'])){
            $unit_args["p"] = $unit_profile;
        }

        $units = Units::getListUnits($unit_args);

        $dateAgenda = get_post_meta(get_the_ID(),'dateAgenda',true);

        $dataComposta = explode("|", $dateAgenda);
        ?>  
        
        <div class="box-date">

            <fieldset style="border:1px solid #000;padding:10px;">

                <p style="font-size:16px;font-weight:700;">Selecione os intervalos de início e fim do evento, confirme e atualize.</p>
                <p>
                    <label for="date_start">Data de Início: </label>
                    <input type="date" name="date_start" id="date_start" class="date" value="<?php echo $dataComposta[0]; ?>" />
                </p>

                <p>
                    <label for="date_end">Data de Término: </label>
                    <input type="date" name="date_end" id="date_end" class="date" value="<?php echo $dataComposta[1]; ?>" />
                </p>

                <button type="button" id="getDate">Confirmar Data Selecionada</button>

            </fieldset>

        </div>
        <input type="hidden" name="dateAgenda" id="saveDateAgenda" />
            
    <?php
    }

    public function saveCustomFields($postId) {

        // Verificando se é um AUTOSAVE
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;

        // if our nonce isn't there, or we can't verify it, bail 
        if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce'))
            return;

        //verificando se o usuário pode editar o post
        if (!current_user_can('edit_post'))
            return;

        if (isset($_POST['dateAgenda']))
            update_post_meta($postId, 'dateAgenda', $_POST['dateAgenda']);
        
    }

}
?>