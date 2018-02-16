<?php

class Coordinators {

    public function getCoordinators($options = array()) {

        $args = array("post_type" => "coordinators", "orderby" => "post_title", "order" => "ASC", "posts_per_page" => -1);

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getListCoordinators($options = array()) {

        $data = self::getCoordinators($options);

        $coordinators = array();

        while ($data->have_posts()) {
            $data->the_post();
            $coordinators[get_the_ID()] = get_the_title();
        }

        return $coordinators;
    }

    public function getCoordinatorById($unit_id) {

        $args = array("p" => $unit_id);

        return new WP_Query($args);
    }

    public function createCustomPostType() {

        register_post_type('coordinators', array(
            'label' => 'Tipos',
            'description' => 'Cadastro de Tipo',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'tipos'),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory") . '/wp5/img/icon-coordinators.png',
            'labels' => array(
                'name' => 'Tipos',
                'singular_name' => 'Tipo',
                'menu_name' => 'Tipos',
                'add_new' => 'Novo Tipo',
                'add_new_item' => 'Novo Tipo',
                'edit' => 'Editar',
                'edit_item' => 'Editar Tipo',
                'new_item' => 'Novo Tipo',
                'view' => 'Ver Tipo',
                'view_item' => 'Ver Tipo',
                'search_items' => 'Buscar Tipos',
                'not_found' => 'No Destaques Found',
                'not_found_in_trash' => 'No Destaques Found in Trash',
                'parent' => 'Parent Tipo',
            ),
        ));

        add_action('add_meta_boxes', array(&$this, 'addCustomFields'));
        add_action('save_post', array(&$this, 'saveCustomFields'));
    }

    public function addCustomFields() {

        add_meta_box("unitsCustomFields", "Dados do Tipo", array(&$this, "formCustomFields"), "coordinators", "normal", "low");
    }

    public function formCustomFields() {

        global $post;

        $data = get_post_custom($post->ID);

        $curriculum = (isset($data["curriculum_coordinator"])) ? $data["curriculum_coordinator"][0] : '';
        $mail_coordinators = (isset($data["mail_coordinator"])) ? $data["mail_coordinator"][0] : '';

        wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');
        ?> 
        <p>
            <label for="mailCoordinator">Email: </label>
            <input type="text" name="mail_coordinator" id=mailCoordinator" value="<?php echo $mail_coordinators; ?>" style="width:500px" />
        </p>
        <p>
            <label for="curriculumCoordinator">Curriculo: </label>
            <input type="text" name="curriculum_coordinator" id=curriculumCoordinator" value="<?php echo $curriculum; ?>" style="width:500px" />
        </p>
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


        // Salvando dados do formulário
        if (isset($_POST['curriculum_coordinator']))
            update_post_meta($postId, 'curriculum_coordinator', $_POST['curriculum_coordinator']);
        
          // Salvando dados do formulário
        if (isset($_POST['mail_coordinator']))
            update_post_meta($postId, 'mail_coordinator', $_POST['mail_coordinator']);
    }

}
?>