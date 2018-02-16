<?php
require_once('calendar.php');

class Events {

    public function Events() {

        $this->createCustomPostType();
    }

    public function getAllEvents($options = array()) {

        $args = array("post_type" => "events", "orderby" => "post_date", "order" => "DESC", "posts_per_page" => -1); 

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getAllEventsByYear($year, $options) {

        $args = array(
            "orderby" => "meta_value",
            "meta_key" => "date_event_end",
            "order" => "ASC",
            "meta_query" => array(
                array(
                    "key" => "date_event_end",
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

            $month = date("n", strtotime(get_post_meta(get_the_ID(), "date_event_end", true)));

            $events[$month][] = array(
                "title" => get_the_title(),
                "date" => get_post_meta(get_the_ID(), "date_event_end", true)
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
            "meta_key" => "date_event_end",
            "posts_per_page" => -1,
            "meta_query"=>array(
                array(
                    "key"=>"date_event_end",
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
                 WHERE meta_key = "date_event_end" AND MONTH(meta_value) = "' . $month . '" AND YEAR(meta_value) = "' . $year . '"');

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

        $details = (isset($data["details"])) ? $data["details"][0] : '';
        $programing_event = (isset($data["programing_event"])) ? $data["programing_event"][0] : '';
        $investment_event = (isset($data["investment_event"])) ? $data["investment_event"][0] : '';
        $matriculation_event = (isset($data["matriculation_event"])) ? $data["matriculation_event"][0] : '';
        $gallery_event = (isset($data["gallery_event"])) ? $data["gallery_event"][0] : '';
        $hour_event = (isset($data["hour_event"])) ? $data["hour_event"][0] : '';
        $link_event = (isset($data["link_event"])) ? $data["link_event"][0] : '';
        $type_event = (isset($data["type_event"])) ? $data["type_event"][0] : '';
        $unit_event = (isset($data["unit_event"])) ? $data["unit_event"][0] : '';
        $area_event = (isset($data["area_event"])) ? $data["area_event"][0] : '';
        $course_event = (isset($data["course_event"])) ? $data["course_event"][0] : '';
        $contact_event = (isset($data["contact_event"])) ? $data["contact_event"][0] : '';
        $periodo_event = (isset($data["periodo_event"])) ? $data["periodo_event"][0] : '';
        $date_event_start = (isset($data["date_event_start"])) ? $data["date_event_start"][0] : '';
        $date_event = (isset($data["date_event"])) ? $data["date_event"][0] : '';
        $presentation_event = (isset($data["presentation_event"])) ? $data["presentation_event"][0] : '';

        wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');
        
        $areas = Areas::getListAreas();

        $courses = Courses::getListCourses();

        $events = Events::getAllEvents();
        
        $unit_args = array();
        $unit_profile = get_user_meta($current_user->data->ID,"unit_profile",true);
        if(isset($current_user->caps['marketing']) && ($current_user->caps['marketing'])){
            $unit_args["p"] = $unit_profile;
        }

        $units = Units::getListUnits($unit_args);
        ?>  
        <p>
            <label for="details">Mais Deatlhes do Evento: </label><br/>
            <?php wp_editor($details, "details", array("textarea_name" => "details")); ?>
        </p>
        <p>
            <label for="programingevent">Programação: </label><br/>
            <?php wp_editor($programing_event, "programingevent", array("textarea_name" => "programing_event")); ?>
        </p>

        <p>
            <label for="investmentevent">Investimento: </label><br/>
            <?php wp_editor($investment_event, "investmentevent", array("textarea_name" => "investment_event")); ?>
        </p>

        <p>
            <label for="matriculationevent">Taxa de Inscrição: </label><br/>
            <?php wp_editor($matriculation_event, "matriculationevent", array("textarea_name" => "matriculation_event")); ?>
        </p>

        <p>
            <label for="galleryevent">Galeria: </label><br/>
            <?php wp_editor($gallery_event, "galleryevent", array("textarea_name" => "gallery_event")); ?>
        </p>
        <p>
            <label for="periodo_event">Periodo do Evento: </label>
            <input type="text" name="periodo_event" id="periodo_event" class="date" value="<?php echo $periodo_event; ?>" style="width:300px"/>
        </p>
        <p>
            <label for="date_event_start">Data Inicio Publicação Evento: </label>
            <input type="date" name="date_event_start" id="date_event_start" value="<?php echo $date_event_start; ?>" />
        </p>
        <p>
            <label for="date_event">Data Fim Publicação Evento: </label>
            <input type="date" name="date_event" id="date_event" value="<?php echo $date_event; ?>" />
        </p>
        <p>
            <label for="hourEvent">Hora: </label>
            <input type="text" name="hour_event" id="hourEvent" value="<?php echo $hour_event; ?>" />
        </p>
        <p>
            <label for="presentation_event">Apresentação: </label>
            <input type="text" name="presentation_event" id="presentation_event" class="url" style="width:300px" value="<?php echo $presentation_event; ?>" />
        </p>
        <p>
            <label for="contact_event">Contato: </label>
            <input type="text" name="contact_event" id="contact_event" class="url" style="width:600px" value="<?php echo $contact_event; ?>" />
        </p>
        <p>
            <label for="link_event">Link Inscrição: </label>
            <input type="text" name="link_event" id="link_event" class="url" style="width:600px" value="<?php echo $link_event; ?>" />
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
        if (isset($_POST['details']))
            update_post_meta($postId, 'details', $_POST['details']);

        if (isset($_POST['programing_event']))
            update_post_meta($postId, 'programing_event', $_POST['programing_event']);
        
        if (isset($_POST['investment_event']))
            update_post_meta($postId, 'investment_event', $_POST['investment_event']);
        
        if (isset($_POST['matriculation_event']))
            update_post_meta($postId, 'matriculation_event', $_POST['matriculation_event']);
        
        if (isset($_POST['gallery_event']))
            update_post_meta($postId, 'gallery_event', $_POST['gallery_event']);

        if (isset($_POST['link_event']))
            update_post_meta($postId, 'link_event', $_POST['link_event']);

        if (isset($_POST['date_event']))
            update_post_meta($postId, 'date_event', $_POST['date_event']);

        if (isset($_POST['date_event_start']))
            update_post_meta($postId, 'date_event_start', $_POST['date_event_start']);

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
        
        if (isset($_POST['contact_event']))
            update_post_meta($postId, 'contact_event', $_POST['contact_event']);

        if (isset($_POST['periodo_event']))
            update_post_meta($postId, 'periodo_event', $_POST['periodo_event']);

        if (isset($_POST['presentation_event'])) 
            update_post_meta($postId,'presentation_event',$_POST['presentation_event']);
        
    }

}
?>