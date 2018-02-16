<?php

class Countries {

    public function getCountries($options = array()) {

        $args = array("post_type" => "countries", "orderby" => "post_title", "order" => "ASC", "posts_per_page" => -1);

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getListCountries($options = array()) {
        
        $data = self::getCountries($options);
        $countries = array();

        while ($data->have_posts()) {
            $data->the_post();
            $countries[get_the_ID()] = get_the_title();
        }

        return $countries;
    }

    public function getCountryById($unit_id) {

        $args = array("p" => $unit_id, 'post_type' => 'countries');
        
        //debug($args);

        return new WP_Query($args);
        
       
    }

    public function createCustomPostType() {

        register_post_type('countries', array(
            'label' => 'Países',
            'description' => 'Cadastro de Países',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'paises'),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title'),
            'menu_icon' => get_bloginfo("stylesheet_directory") . '/wp5/img/icon-units.png',
            'labels' => array(
                'name' => 'Países',
                'singular_name' => 'País',
                'menu_name' => 'Países',
                'add_new' => 'Novo País',
                'add_new_item' => 'Novo País',
                'edit' => 'Editar',
                'edit_item' => 'Editar País',
                'new_item' => 'Novo País',
                'view' => 'Ver País',
                'view_item' => 'Ver País',
                'search_items' => 'Buscar Países',
                'not_found' => 'No Destaques Found',
                'not_found_in_trash' => 'No Destaques Found in Trash',
                'parent' => 'Parent País',
            ),
        ));

        add_action('add_meta_boxes', array(&$this, 'addCustomFields'));
        add_action('save_post', array(&$this, 'saveCustomFields'));
    }

    public function addCustomFields() {

        //add_meta_box("unitsCustomFields", "Dados da Unidade", array(&$this, "formCustomFields"), "countries", "normal", "low");
    }

    public function formCustomFields() {

        global $post;

        $data = get_post_custom($post->ID);

        $infraUnit = (isset($data["infra_unit"])) ? $data["infra_unit"][0] : '';
        $galleryUnit = (isset($data["gallery_unit"])) ? $data["gallery_unit"][0] : '';
        $text2 = (isset($data["text2_unit"])) ? $data["text2_unit"][0] : '';
        $phone = (isset($data["phone_unit"])) ? $data["phone_unit"][0] : '';
        $email = (isset($data["email_unit"])) ? $data["email_unit"][0] : '';
        $address = (isset($data["address_unit"])) ? $data["address_unit"][0] : '';
        $state = (isset($data["state_unit"])) ? $data["state_unit"][0] : '';
        $city = (isset($data["city_unit"])) ? $data["city_unit"][0] : '';
        
        wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');
        ?>          
        <p>
            <label for="text2Unit">Texto Complementar: </label><br/>
            <textarea name="text2_unit" id="text2Unit" style="width:755px"><?php echo $text2; ?></textarea>
        </p>
        <p>
            <label for="infraUnit">Mais Informações:</label>
            <?php wp_editor($infraUnit, "infraUnit", array("textarea_name" => "infra_unit")); ?>
        </p>
        <p>
            <label for="galleryUnit">Galeria:</label>
            <?php wp_editor($galleryUnit, "galleryUnit", array("textarea_name" => "gallery_unit")); ?>
        </p>
        <p>
            <label for="phoneUnit">Telefone: </label>
            <input type="text" name="phone_unit" id="phoneUnit" value="<?php echo $phone; ?>" style="width:500px" />
        </p>
        <p>
            <label for="emailUnit">Email: </label>
            <input type="text" name="email_unit" id="emailUnit" value="<?php echo $email; ?>" style="width:500px" />
        </p>
        <p>
            <label for="addressUnit">Endereço: </label>
            <input type="text" name="address_unit" id="addressUnit" value="<?php echo $address; ?>" style="width:500px" />
        </p>
        <p>
            <label for="stateUnit">Estado: </label>
            <input type="text" name="state_unit" id="stateUnit" value="<?php echo $state; ?>" style="width:200px" />
        </p>
        <p>
            <label for="cityUnit">Cidade: </label>
            <input type="text" name="city_unit" id="cityUnit" value="<?php echo $city; ?>" style="width:200px" />
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
        if (isset($_POST['infra_unit']))
            update_post_meta($postId, 'infra_unit', $_POST['infra_unit']);
        
        if (isset($_POST['gallery_unit']))
            update_post_meta($postId, 'gallery_unit', $_POST['gallery_unit']);
        
        if (isset($_POST['text2_unit']))
            update_post_meta($postId, 'text2_unit', $_POST['text2_unit']);

        if (isset($_POST['phone_unit']))
            update_post_meta($postId, 'phone_unit', $_POST['phone_unit']);

        if (isset($_POST['email_unit']))
            update_post_meta($postId, 'email_unit', $_POST['email_unit']);

        if (isset($_POST['address_unit']))
            update_post_meta($postId, 'address_unit', $_POST['address_unit']);

        if (isset($_POST['state_unit']))
            update_post_meta($postId, 'state_unit', $_POST['state_unit']);

        if (isset($_POST['city_unit']))
            update_post_meta($postId, 'city_unit', $_POST['city_unit']);
    }

}
?>