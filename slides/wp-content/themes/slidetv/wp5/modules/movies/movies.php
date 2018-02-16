<?php

class Movies {

    public function Movies() {

        $this->createCustomPostType();
    }

    public function getAllMovies($options = array()) {


        $args = array("post_type" => "movies", "orderby" => "post_date", "order" => "DESC", "posts_per_page" => -1);

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getCategoriesMovies() {

        $categories = get_terms(array("category_publi"), array("hide_empty" => false));

        return $categories;
    }

    public function getAllYears() {

        global $wpdb;

        $years = $wpdb->get_results("SELECT YEAR(meta_value) as year FROM wp_postmeta WHERE meta_key = 'date_publication' GROUP BY YEAR(meta_value) ORDER BY YEAR(meta_value) ASC");

        return $years;
    }

    public function getMoviesByMeta($meta, $value, $limit = 100) {

        global $wpdb;

        $data = $wpdb->get_results('SELECT post_id , meta_key , meta_value , Post.ID , Post.post_title , Post.post_date , Post.guid FROM sva_postmeta
                                    INNER JOIN sva_posts AS Post ON(Post.ID = post_id)
                                    WHERE meta_key = "' . $meta . '" AND meta_value = "' . $value . '"
                                    LIMIT ' . $limit);

        return $data;
    }

    public function createCustomPostType() {

        register_post_type('movies', array(
            'label' => 'Filmes',
            'description' => 'Cadastro de Filme',
            'public' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'cinema'),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory") . '/wp5/img/icon-highlights.png',
            'labels' => array(
                'name' => 'Filmes',
                'singular_name' => 'Filme',
                'menu_name' => 'Filmes',
                'add_new' => 'Novo Filme',
                'add_new_item' => 'Novo Filme',
                'edit' => 'Editar',
                'edit_item' => 'Editar Filme',
                'new_item' => 'Novo Filme',
                'view' => 'Ver Filme',
                'view_item' => 'Ver Filme',
                'search_items' => 'Buscar Filme',
                'not_found' => 'No Atalho Found',
                'not_found_in_trash' => 'No Filme Found in Trash',
                'parent' => 'Parent Filme',
            ),
        ));

        register_taxonomy('category_publi', array('movies'), array(
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
        //add_meta_box("shortcutsCustomFields", "Dados Atalho", array(&$this, "formCustomFields"), "movies", "normal", "low");
    }

    public function formCustomFields() {

        global $post;

        $data = get_post_custom($post->ID);

        $genre = (isset($data["genre"])) ? $data["genre"][0] : '';
        $classification = (isset($data["classification"])) ? $data["classification"][0] : '';
        $duration = (isset($data["duration"])) ? $data["duration"][0] : '';

        $multiple_date = (isset($data["multiple_date"])) ? $data["multiple_date"][0] : '';
        $date_exhibition_02 = (isset($data["date_exhibition_02"])) ? $data["date_exhibition_02"][0] : '';
        $date_exhibition_03 = (isset($data["date_exhibition_03"])) ? $data["date_exhibition_03"][0] : '';
        $date_exhibition_04 = (isset($data["date_exhibition_04"])) ? $data["date_exhibition_04"][0] : '';
        $date_exhibition_05 = (isset($data["date_exhibition_05"])) ? $data["date_exhibition_05"][0] : '';
        
        $hour_exhibition = (isset($data["hour_exhibition"])) ? $data["hour_exhibition"][0] : '';
        $language = (isset($data["language"])) ? $data["language"][0] : '';
        $type_session = (isset($data["type_session"])) ? $data["type_session"][0] : '';
        $trailler = (isset($data["trailler"])) ? $data["trailler"][0] : '';

        wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');
           

        $mes = date("m");
        $ano = date("Y");
        $dia = date("d");
        $dia_semana = date("w");

        $dia_calendario_full = date("d/m/Y",mktime(0,0,0,$mes,$dia-$dia_semana,$ano));
        $dia_s_calendario = dia(date("w",mktime(0,0,0,$mes,$dia-$dia_semana,$ano)));


        
        
        ?>  
        <p>
        <?php 
        // echo "<pre>";
        // print_r($calendar);
        // //print_r($dia_s_calendario);
        // die();
        ?>
        </p>
        <!-- <p>
            <label for="genre">Gênero :</label>
            <input type="text" name="genre" id="genre" value="<?php echo $genre; ?>" class="date" style="width:200px;" />
        </p>
        <p>
            <label for="classification">Classificação:</label>
            <input type="text" name="classification" id="classification" value="<?php echo $classification; ?>" class="date" style="width:200px;" />
        </p>
        <p>
            <label for="duration">Duração:</label>
            <input type="text" name="duration" id="duration" value="<?php echo $duration; ?>" class="date" style="width:200px;" />
        </p> -->

        <!-- <p>
            <fieldset style="border:1px solid #6a7684;padding:1rem;margin-bottom:1rem;">
                <legend style="font-weight: bold;">Datas de exibição:</legend>
                    
                    <div style="width:100%;">
                        <label for="date_exhibition">Segunda-Feira:</label>
                        <input type="date" name="date_exhibition_01" id="date_exhibition" value="<?php echo $date_exhibition_01; ?>" class="date" style="width:200px;" />
                    </div>
                    
                    <div style="width:100%;">
                        <label for="date_exhibition">Terça-Feira:</label>
                        <input type="date" name="date_exhibition_02" id="date_exhibition" value="<?php echo $date_exhibition_02; ?>" class="date" style="width:200px;" />
                    </div>
                    
                    <div style="width:100%;">
                        <label for="date_exhibition">Quarta-Feira:</label>
                        <input type="date" name="date_exhibition_03" id="date_exhibition" value="<?php echo $date_exhibition_03; ?>" class="date" style="width:200px;" />
                    </div>
                    
                    <div style="width:100%;">
                        <label for="date_exhibition">Quinta-Feira:</label>
                        <input type="date" name="date_exhibition_04" id="date_exhibition" value="<?php echo $date_exhibition_04; ?>" class="date" style="width:200px;" />
                    </div>
                    
                    <div style="width:100%;">
                        <label for="date_exhibition">Sexta-Feira:</label>
                        <input type="date" name="date_exhibition_05" id="date_exhibition" value="<?php echo $date_exhibition_05; ?>" class="date" style="width:200px;" />
                    </div>

                    <div style="width:100%;">
                        <label for="date_exhibition">Sabado:</label>
                        <input type="date" name="date_exhibition_04" id="date_exhibition" value="<?php echo $date_exhibition_04; ?>" class="date" style="width:200px;" />
                    </div>
                    
                    <div style="width:100%;">
                        <label for="date_exhibition">Domingo:</label>
                        <input type="date" name="date_exhibition_05" id="date_exhibition" value="<?php echo $date_exhibition_05; ?>" class="date" style="width:200px;" />
                    </div>
                    <div class="date-pick">tste</div>

            </fieldset>
        </p> -->
        <!-- <p>
            <label for="hour_exhibition">Horario de exibição:</label>
            <input type="text" name="hour_exhibition" id="hour_exhibition" value="<?php echo $hour_exhibition; ?>" class="date" style="width:200px;" />
        </p>
        <p>
            <label for="language">Idioma: </label>
            <select name="language" style="width:300px" id="language">
                <option value="">Selecione um Idioma</option>                
                <option value="1" <?php echo ($language==1) ? 'selected="selected"' : '';?>>Dublado</option>
                <option value="2" <?php echo ($language==2) ? 'selected="selected"' : '';?>>Legendado</option>
            </select>
        </p>
        <p>
            <label for="type_session">Tipo da Sessão: </label>
            <select name="type_session" style="width:300px" id="type_session">
                <option value="">Selecione um tipo</option>                
                <option value="1" <?php echo ($type_session==1) ? 'selected="selected"' : '';?>>Normal</option>
                <option value="2" <?php echo ($type_session==2) ? 'selected="selected"' : '';?>>3D</option>
            </select>
        </p>
        <p>
            <label for="trailler">Url do Trailler:</label>
            <input type="text" name="trailler" id="trailler" value="<?php echo $trailler; ?>" class="date" style="width:400px;" />
        </p> -->
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


        if (isset($_POST['genre']))
            update_post_meta($postId, 'genre', $_POST['genre']);
        
        if (isset($_POST['classification']))
            update_post_meta($postId, 'classification', $_POST['classification']);

        if (isset($_POST['duration']))
            update_post_meta($postId, 'duration', $_POST['duration']);

        if (isset($_POST['multiple_date']))
            update_post_meta($postId, 'multiple_date', $_POST['multiple_date']);
        
        if (isset($_POST['date_exhibition_02']))
            update_post_meta($postId, 'date_exhibition_02', $_POST['date_exhibition_02']);

        if (isset($_POST['date_exhibition_03']))
            update_post_meta($postId, 'date_exhibition_03', $_POST['date_exhibition_03']);

        if (isset($_POST['date_exhibition_04']))
            update_post_meta($postId, 'date_exhibition_04', $_POST['date_exhibition_04']);

        if (isset($_POST['date_exhibition_05']))
            update_post_meta($postId, 'date_exhibition_05', $_POST['date_exhibition_05']);

        if (isset($_POST['hour_exhibition']))
            update_post_meta($postId, 'hour_exhibition', $_POST['hour_exhibition']);

        if (isset($_POST['language']))
            update_post_meta($postId, 'language', $_POST['language']);

        if (isset($_POST['type_session']))
            update_post_meta($postId, 'type_session', $_POST['type_session']);

        if (isset($_POST['trailler']))
            update_post_meta($postId, 'trailler', $_POST['trailler']);
    }

}
?>
