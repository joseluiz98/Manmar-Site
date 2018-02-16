<?php

class Publications {

    public function Publications() {

        $this->createCustomPostType();
    }

    public function getAllPublications($options = array()) {


        $args = array("post_type" => "publications", "orderby" => "post_date", "order" => "DESC", "posts_per_page" => -1);

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getCategoriesPublication() {

        $categories = get_terms(array("category_publi"), array("hide_empty" => false));

        return $categories;
    }

    public function getAllYears() {

        global $wpdb;

        $years = $wpdb->get_results("SELECT YEAR(meta_value) as year FROM wp_postmeta WHERE meta_key = 'date_publication' GROUP BY YEAR(meta_value) ORDER BY YEAR(meta_value) ASC");

        return $years;
    }

    public function getPublicationsByMeta($meta, $value, $limit = 100) {

        global $wpdb;

        $data = $wpdb->get_results('SELECT post_id , meta_key , meta_value , Post.ID , Post.post_title , Post.post_date , Post.guid FROM wp_postmeta
                                    INNER JOIN wp_posts AS Post ON(Post.ID = post_id)
                                    WHERE meta_key = "' . $meta . '" AND meta_value = "' . $value . '"
                                    LIMIT ' . $limit);

        return $data;
    }

    public function createCustomPostType() {

        register_post_type('publications', array(
            'label' => 'Publicações',
            'description' => 'Cadastro de Publicação',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => ''),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory") . '/wp5/img/icon-highlights.png',
            'labels' => array(
                'name' => 'Publicações',
                'singular_name' => 'Publicação',
                'menu_name' => 'Publicações',
                'add_new' => 'Nova Publicação',
                'add_new_item' => 'Nova Publicação',
                'edit' => 'Editar',
                'edit_item' => 'Editar Publicação',
                'new_item' => 'Nova Publicação',
                'view' => 'Ver Publicação',
                'view_item' => 'Ver Publicação',
                'search_items' => 'Buscar Publicação',
                'not_found' => 'No Atalho Found',
                'not_found_in_trash' => 'No Publicação Found in Trash',
                'parent' => 'Parent Publicação',
            ),
        ));

        register_taxonomy('category_publi', array('publications'), array(
            'hierarchical' => true,
            'labels' => array(
                'name' => __('Categoria'),
                'singular_name' => __('Categoria'),
                'search_items' => __('Buscar'),
                'popular_items' => __('Mais usados'),
                'all_items' => __('Todos as Categoria'),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __('Editar Categoria'),
                'update_item' => __('Atualizar'),
                'add_new_item' => __('Adicionar Categoria'),
                'new_item_name' => __('Nova Categoria')
            ),
            'singular_label' => 'Categoria',
            'all_items' => 'Todas Categorias',
            'query_var' => true,
            'rewrite' => array('slug' => 'type'))
        );


        add_action('add_meta_boxes', array(&$this, 'addCustomFields'));
        add_action('save_post', array(&$this, 'saveCustomFields'));
    }

    public function addCustomFields() {
        add_meta_box("shortcutsCustomFields", "Dados Atalho", array(&$this, "formCustomFields"), "publications", "normal", "low");
    }

    public function formCustomFields() {

        global $post;

        $data = get_post_custom($post->ID);

        $pdf = (isset($data["pdf_publication"])) ? $data["pdf_publication"][0] : '';
        $date = (isset($data["date_publication"])) ? $data["date_publication"][0] : '';
        $course_publication = (isset($data["course_publication"])) ? $data["course_publication"][0] : '';

        wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');
        
        $courses = Courses::getListCourses(array("orderby"=>"title"));
       
        
        ?>    
        <p>
            <label for="pdfPublication">PDF :</label>
            <input type="file" name="pdf_publication" id="pdfPublication" style="width:400px" />
        </p>
        <p>
            <label for="datePublication">Data de publicação :</label>
            <input type="text" name="date_publication" id="datePublication" value="<?php echo $date; ?>" class="date" style="width:100px" />
        </p>
        <p>
            <label for="coursePublication">Curso: </label>
            <select name="course_publication" style="width:300px" id="coursePublication">
                <option value="">Selecione um Curso</option>                
                <?php foreach ($courses as $key => $course) { ?>
                    <option value="<?php echo $key; ?>" <?php echo ($course_publication == $key) ? 'selected="selected"' : ''; ?>><?php echo $course; ?> - <?php echo get_the_title(get_post_meta($key,"unit_course",true));?></option>
                <?php } ?>
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


        if (isset($_POST['date_publication']))
            update_post_meta($postId, 'date_publication', $_POST['date_publication']);
        
        if (isset($_POST['course_publication']))
            update_post_meta($postId, 'course_publication', $_POST['course_publication']);


        if (isset($_FILES["pdf_publication"]) && $_FILES["pdf_publication"]['name'] != "") {

            $upload = wp_handle_upload($_FILES["pdf_publication"], array('test_form' => false));

            update_post_meta($postId, "pdf_publication", $upload["url"]);
        }
    }

}
?>
