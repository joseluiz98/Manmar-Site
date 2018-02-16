<?php
require_once('calendar.php');

class Events {

    public function Events() {

        $this->createCustomPostType();
    }

    public function getAllEvents($options = array()) {

        $args = array("post_type" => "events", "orderby" => "post_date", "order" => "DESC", "posts_per_page" => -1, 
            "meta_query"=>array(
                array(
                    "key"=>"date_event",
                    "value"=>date("Y-m-d"),
                    "compare"=>">="
                )
            ));

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getAllEventsByYear($year, $options) {

        $args = array(
            "orderby" => "meta_value",
            "meta_key" => "date_event",
            "order" => "ASC",
            "meta_query" => array(
                array(
                    "key" => "date_event",
                    "value" => $year,
                    "compare" => "LIKE"
                )
            )
        );

        $args = $args + $options;

        $data = self::getAllEvents($args);

        $events = array();

        while ($data->have_posts()) {
            $data->the_post();

            $month = date("n", strtotime(get_post_meta(get_the_ID(), "date_event", true)));

            $events[$month][] = array(
                "title" => get_the_title(),
                "date" => get_post_meta(get_the_ID(), "date_event", true)
            );
        }

        wp_reset_postdata();

        return $events;
    }

    public function getEventsByMonth($month,$year,$options){

        $month = str_pad($month,2,0,STR_PAD_LEFT);

        $args = array(  
            "post_type" => "events", 
            "orderby" => "meta_value_num",
            "order" => "ASC", 
            "meta_key" => "date_event",
            "posts_per_page" => -1,
            "meta_query"=>array(
                array(
                    "key"=>"date_event",
                    "compare"=>"BETWEEN",
                    "value"=> array($year."-".$month."-"."1",$year."-".$month."-31")
                )
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getCalendar($month, $year) {

        global $wpdb;

        $calendar = Calendar::getCalendar($month, $year);

        $events = $wpdb->get_results('SELECT post_id , meta_key , meta_value , Post.ID , Post.post_title , Post.post_date , Post.guid FROM wp_postmeta
                 INNER JOIN wp_posts AS Post ON(Post.ID = post_id)
                 WHERE meta_key = "date_event" AND MONTH(meta_value) = "' . $month . '" AND YEAR(meta_value) = "' . $year . '"');

        foreach ($events as $event) {

            $eventDay = date("d", strtotime($event->meta_value));

            foreach ($calendar["weeks"] as $key => $week) {

                foreach ($week as $key2 => $day) {

                    if ($day["day"] == $eventDay) {

                        $calendar["weeks"][$key][$key2][] = $event;
                    }
                }
            }
        }

        return $calendar;
    }

    public function createCustomPostType() {

        register_post_type('events', array(
            'label' => 'Eventos',
            'description' => 'Cadastro de Eventos',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'eventos'),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory") . '/wp5/img/icon-events.png',
            'labels' => array(
                'name' => 'Eventos',
                'singular_name' => 'Evento',
                'menu_name' => 'Eventos',
                'add_new' => 'Novo Evento',
                'add_new_item' => 'Novo Evento',
                'edit' => 'Editar',
                'edit_item' => 'Editar Evento',
                'new_item' => 'Novo Evento',
                'view' => 'Ver Evento',
                'view_item' => 'Ver Evento',
                'search_items' => 'Buscar Eventos',
                'not_found' => 'No Destaques Found',
                'not_found_in_trash' => 'No Destaques Found in Trash',
                'parent' => 'Parent Evento',
            ),
        ));

        register_taxonomy('type', array('events'), array(
            'hierarchical' => true,
            'labels' => array(
                'name' => __('Tipo'),
                'singular_name' => __('Tipo'),
                'search_items' => __('Buscar'),
                'popular_items' => __('Mais usados'),
                'all_items' => __('Todos os Tipos'),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __('Editar Tipo'),
                'update_item' => __('Atualizar'),
                'add_new_item' => __('Adicionar Tipo'),
                'new_item_name' => __('Novo Tipo')
            ),
            'singular_label' => 'Tipo',
            'all_items' => 'Todos Tipos',
            'query_var' => true,
            'rewrite' => array('slug' => 'type'))
        );

        add_filter('manage_edit-events_columns', array(&$this, "manageCustomColumn"));
        add_action('manage_events_posts_custom_column', array(&$this, "manageCustomColumnContent"), 10, 2);
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
            $unit_id = get_post_meta($post_id, "unit_event", true);
            if ($unit_id != "") {
                echo get_the_title($unit_id);
            } else {
                echo "";
            }
        }
    }

    public function addCustomFields() {

        add_meta_box("eventsCustomFields", "Dados do Evento", array(&$this, "formCustomFields"), "events", "normal", "low");
    }

    public function formCustomFields() {

        global $post;

        $data = get_post_custom($post->ID);
        
        $current_user = wp_get_current_user();

        $date = (isset($data["date_event"])) ? $data["date_event"][0] : '';
        $hour = (isset($data["hour_event"])) ? $data["hour_event"][0] : '';
        $link = (isset($data["link_event"])) ? $data["link_event"][0] : '';
        $type = (isset($data["type_event"])) ? $data["type_event"][0] : '';
        $unitId = (isset($data["unit_event"])) ? $data["unit_event"][0] : '';
        $areaId = (isset($data["area_event"])) ? $data["area_event"][0] : '';
        $courseId = (isset($data["course_event"])) ? $data["course_event"][0] : '';

        wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');
        
        $areas = Areas::getListAreas();

        $courses = Courses::getListCourses();
        
        $unit_args = array();
        $unit_profile = get_user_meta($current_user->data->ID,"unit_profile",true);
        if(isset($current_user->caps['marketing']) && ($current_user->caps['marketing'])){
            $unit_args["p"] = $unit_profile;
        }

        $units = Units::getListUnits($unit_args);
        ?>  

        
        <p>
            <label for="dateEvent">Data: </label>
            <input type="text" name="date_event" id="dateEvent" class="date" value="<?php echo $date; ?>" />
        </p>
        <p>
            <label for="hourEvent">Hora: </label>
            <input type="text" name="hour_event" id="hourEvent" value="<?php echo $hour; ?>" />
        </p>
        <p>
            <label for="linkEvent">Link: </label>
            <input type="text" name="link_event" id="linkEvent" class="url" style="width:600px" value="<?php echo $link; ?>" />
        </p>
        <p>
            <label for="typeEvent">Tipo: </label>
            <select name="type_event" id="typeEvent">
                <option value="1" <?php echo ($type == 1) ? 'selected="selected"' : ''; ?>>Gratuito</option>
                <option value="2" <?php echo ($type == 2) ? 'selected="selected"' : ''; ?>>Pago</option>
            </select>    
        </p>
        
        <p>
            <label for="unitEvent">Unidade: </label>
            <select name="unit_event" id="unitEvent">
                <option value="">Selecione a Unidade</option>
        <?php foreach ($units as $key => $unit): ?>
                    <option value="<?php echo $key; ?>" <?php echo ($unitId == $key) ? 'selected="selected"' : ''; ?>><?php echo $unit; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="areaEvent">Área: </label>
            <select name="area_event" id="areaEvent">
                <option value="">Selecione a Área</option>
        <?php foreach ($areas as $key => $area): ?>
                    <option value="<?php echo $key; ?>" <?php echo ($areaId == $key) ? 'selected="selected"' : ''; ?>><?php echo $area; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="courseEvent">Curso: </label>
            <select name="course_event" id="courseEvent">
                <option value="">Selecione o Curso</option>
        <?php foreach ($courses as $key => $course): ?>
                    <option value="<?php echo $key; ?>" <?php echo ($courseId == $key) ? 'selected="selected"' : ''; ?>><?php echo $course; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
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
        if (isset($_POST['link_event']))
            update_post_meta($postId, 'link_event', $_POST['link_event']);

        if (isset($_POST['date_event']))
            update_post_meta($postId, 'date_event', $_POST['date_event']);

        if (isset($_POST['hour_event']))
            update_post_meta($postId, 'hour_event', $_POST['hour_event']);

        if (isset($_POST['type_event']))
            update_post_meta($postId, 'type_event', $_POST['type_event']);

        if (isset($_POST['unit_event']))
            update_post_meta($postId, 'unit_event', $_POST['unit_event']);

        if (isset($_POST['area_event']))
            update_post_meta($postId, 'area_event', $_POST['area_event']);

        if (isset($_POST['course_event']))
            update_post_meta($postId, 'course_event', $_POST['course_event']);
    }

}
?>