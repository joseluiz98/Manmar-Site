<?php

class Vacancies {

    public $fields = array(
        "storeVacancie",
        "emailContact"
    );

    public function getVacancies($options = array()) {

        $args = array("post_type" => "vacancies", "orderby" => "title", "order" => "ASC", "posts_per_page" => -1);

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getListVacancies($options = array()) {

        $data = self::getVacancies($options);

        $vacancies = array();

        while ($data->have_posts()) {
            $data->the_post();
            $vacancies[get_the_ID()] = get_the_title();
        }

        return $vacancies;
    }

    public function createCustomPostType() {

        register_post_type('vacancies', array(
            'label' => 'Lista de Vagas',
            'description' => 'Cadastro de Vagas',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'vagas'),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title', 'editor'),
            'menu_icon' => get_bloginfo("stylesheet_directory") . '/wp5/img/icon-courses.png',
            'labels' => array(
                'name' => 'Vagas',
                'singular_name' => 'Vagas',
                'menu_name' => 'Vagas',
                'add_new' => 'Nova Vaga',
                'add_new_item' => 'Nova Vaga',
                'edit' => 'Editar',
                'edit_item' => 'Editar Vagas',
                'new_item' => 'Nova Vaga',
                'view' => 'Ver Vagas',
                'view_item' => 'Ver Vaga',
                'search_items' => 'Buscar Vagas',
                'not_found' => 'No Vagas Found',
                'not_found_in_trash' => 'No Vagas Found in Trash',
                'parent' => 'Parent Vagas',
            ),
        ));

        add_filter('manage_edit-vacancies_columns',array(&$this,"manageCustomColumn"));
        add_action('manage_vacancies_posts_custom_column',array(&$this,"manageCustomColumnContent"),10,2);
        add_action('add_meta_boxes', array(&$this, 'addCustomFields'));
        add_action('save_post', array(&$this, 'saveCustomFields'));
    }
    public function manageCustomColumn($columns){
        
        unset($columns["date"]);
        
        $columns["unit"] = "Unidade";
        $columns["date"] = "Data";
        
        return $columns;
        
    }
    
    public function manageCustomColumnContent($column,$post_id){
        
        if($column=="unit"){
            $unit_id = get_post_meta($post_id,"unit_vacancies",true);
            if($unit_id!=""){
                echo get_the_title($unit_id);
            }else{
                echo "";
            }
        }
        
    }

    public function addCustomFields() {

        add_meta_box("courseCustomFields", "Dados da Vaga", array(&$this, "formCustomFields"), "vacancies", "normal", "low");
    }

    
    public function formCustomFields() {

        global $post;

        $data = get_post_custom($post->ID);


        foreach ($this->fields as $field) {
            $$field = (isset($data[$field])) ? $data[$field][0] : '';
        }

        $grid_vacancies = (isset($data["grid_vacancies"])) ? $data["grid_vacancies"][0] : '';

        wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');
           
        //$stores = Stores::getListStores();

        ?>
        <!-- <p>

            <label for="stores">Loja:</label>
            <select name="storeVacancie" style="width:300px" id="stores">
                <option value="">Selecione uma Loja</option>
                <?php foreach ($stores as $key => $store) { ?>
                    <option value="<?php echo $key; ?>" <?php echo ($storeVacancie == $key) ? 'selected="selected"' : ''; ?>><?php echo $store; ?></option>
                <?php } ?>
            </select>
        </p> -->
        <p>
            <label for="emailContact">E-mail para envio de curriculos:</label>
            <input type="text" name="emailContact" id="emailContact" value="<?php echo $emailContact; ?>" class="date" style="width:200px;" />
        </p>

        <p>
            <label for="stores">Loja:</label>
            <select name="storeVacancie" style="width:300px" id="stores">
                
            <?php

            global $wpdb;
            $stores = $wpdb->get_results("SELECT DISTINCT p.ID, p.post_title FROM sva_posts as p INNER JOIN sva_postmeta as pm on p.ID = pm.post_id WHERE p.post_type ='stores' ORDER BY p.post_title ASC");
            $gastronomies = $wpdb->get_results("SELECT DISTINCT p.ID, p.post_title FROM sva_posts as p INNER JOIN sva_postmeta as pm on p.ID = pm.post_id WHERE p.post_type ='gastronomies' ORDER BY p.post_title ASC");
            ?>
            <?php
            foreach ($stores as $store) :
                ?>            
                <option value="<?php echo $store->ID; ?>" <?php echo ($storeVacancie == $store->ID) ? 'selected="selected"' : ''; ?>><?php echo $store->post_title; ?></option>                   
                <?php        
            endforeach;
            foreach ($gastronomies as $gastronomy) :
                ?>            
                <option value="<?php echo $store->ID; ?>" <?php echo ($storeVacancie == $gastronomy->ID) ? 'selected="selected"' : ''; ?>><?php echo $gastronomy->post_title; ?></option>                   
                <?php        
            endforeach;
            ?>
            </select>
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

    

        if (isset($_FILES["grid_vacancies"]) && $_FILES["grid_vacancies"]['name'] != "") {

            $upload = wp_handle_upload($_FILES["grid_vacancies"], array('test_form' => false));

            update_post_meta($postId, "grid_vacancies", $upload["url"]);
        }


        // foreach ($_POST['data'] as $key => $value) {

        //     update_post_meta($postId, $key , $value);
               
        // }
            
        foreach ($this->fields as $field) {

            if (isset($_POST[$field])) {

                update_post_meta($postId, $field, $_POST[$field]);
            }
        }

    }
}
?>