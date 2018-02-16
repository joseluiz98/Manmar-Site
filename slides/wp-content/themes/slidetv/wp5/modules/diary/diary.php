<?php
require_once('calendar.php');

class Agendas {

    public function Agendas() {

        $this->createCustomPostType();
    }

    public function getAllAgendas($options = array()) {

        $args = array("post_type" => "agendas", "orderby" => "post_date", "order" => "DESC", "posts_per_page" => -1); 

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getAllAgendasByYear($year, $options) {

        $args = array(
            "orderby" => "meta_value",
            "meta_key" => "date_agenda",
            "order" => "ASC",
            "meta_query" => array(
                array(
                    "key" => "date_agenda",
                    "value" => $year,
                    "compare" => "LIKE"
                )
            )
        );

        $args = $args + $options;

        $data = self::getAllAgendas($args);

        $agendas = array();

        while ($data->have_posts()) {
            $data->the_post();

            $month = date("n", strtotime(get_post_meta(get_the_ID(), "date_agenda", true)));

            $agendas[$month][] = array(
                "title" => get_the_title(),
                "date" => get_post_meta(get_the_ID(), "date_agenda", true)
            );
        }

        wp_reset_postdata();

        return $agendas;
    }

    public function getAgendasByMonth($month,$year,$options){

        $month = str_pad($month,2,0,STR_PAD_LEFT);

        $args = array(  
            "post_type" => "agendas", 
            "orderby" => "meta_value_num",
            "order" => "ASC", 
            "meta_key" => "date_agenda",
            "posts_per_page" => -1,
            "meta_query"=>array(
                array(
                    "key"=>"date_agenda",
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

        $agendas = $wpdb->get_results('SELECT post_id , meta_key , meta_value , Post.ID , Post.post_title , Post.post_date , Post.guid FROM wp_postmeta
                 INNER JOIN wp_posts AS Post ON(Post.ID = post_id)
                 WHERE meta_key = "date_agenda" AND MONTH(meta_value) = "' . $month . '" AND YEAR(meta_value) = "' . $year . '"');

        foreach ($agendas as $agenda) {

            $agendaDay = date("d", strtotime($agenda->meta_value));

            foreach ($calendar["weeks"] as $key => $week) {

                foreach ($week as $key2 => $day) {

                    if ($day["day"] == $agendaDay) {

                        $calendar["weeks"][$key][$key2][] = $agenda;
                    }
                }
            }
        }

        return $calendar;
    }

    public function createCustomPostType() {

        register_post_type('agendas', array(
            'label' => 'Agendas',
            'description' => 'Cadastro de Agendas',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'agenda'),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory") . '/wp5/img/icon-agendas.png',
            'labels' => array(
                'name' => 'Agendas',
                'singular_name' => 'Agenda',
                'menu_name' => 'Agendas',
                'add_new' => 'Novo Agenda',
                'add_new_item' => 'Novo Agenda',
                'edit' => 'Editar',
                'edit_item' => 'Editar Agenda',
                'new_item' => 'Novo Agenda',
                'view' => 'Ver Agenda',
                'view_item' => 'Ver Agenda',
                'search_items' => 'Buscar Agendas',
                'not_found' => 'No Agendas Found',
                'not_found_in_trash' => 'No Agendas Found in Trash',
                'parent' => 'Parent Agenda',
            ),
        ));

        register_taxonomy('type', array('agendas'), array(
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

        add_meta_box("agendasCustomFields", "Dados do agendao", array(&$this, "formCustomFields"), "agendas", "normal", "low");
    }

    public function formCustomFields() {

        global $post;

        $data = get_post_custom($post->ID);
        
        $current_user = wp_get_current_user();

        $programing_agenda = (isset($data["programing_agenda"])) ? $data["programing_agenda"][0] : '';
        $investment_agenda = (isset($data["investment_agenda"])) ? $data["investment_agenda"][0] : '';
        $matriculation_agenda = (isset($data["matriculation_agenda"])) ? $data["matriculation_agenda"][0] : '';
        $gallery_agenda = (isset($data["gallery_agenda"])) ? $data["gallery_agenda"][0] : '';
        $date_agenda = (isset($data["date_agenda"])) ? $data["date_agenda"][0] : '';
        $hour_agenda = (isset($data["hour_agenda"])) ? $data["hour_agenda"][0] : '';
        $link_agenda = (isset($data["link_agenda"])) ? $data["link_agenda"][0] : '';
        $type_agenda = (isset($data["type_agenda"])) ? $data["type_agenda"][0] : '';
        $unit_agenda = (isset($data["unit_agenda"])) ? $data["unit_agenda"][0] : '';
        $area_agenda = (isset($data["area_agenda"])) ? $data["area_agenda"][0] : '';
        $course_agenda = (isset($data["course_agenda"])) ? $data["course_agenda"][0] : '';
        $contact_agenda = (isset($data["contact_agenda"])) ? $data["contact_agenda"][0] : '';

        wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');
        
        $areas = Areas::getListAreas();

        $courses = Courses::getListCourses();

        $agendas = agendas::getAllagendas();
        
        $unit_args = array();
        $unit_profile = get_user_meta($current_user->data->ID,"unit_profile",true);
        if(isset($current_user->caps['marketing']) && ($current_user->caps['marketing'])){
            $unit_args["p"] = $unit_profile;
        }

        $units = Units::getListUnits($unit_args);
        ?>  

        <p>
            <label for="programingagenda">Programação: </label><br/>
            <?php wp_editor($programing_agenda, "programingagenda", array("textarea_name" => "programing_agenda")); ?>
        </p>

        <p>
            <label for="investmentagenda">Investimento: </label><br/>
            <?php wp_editor($investment_agenda, "investmentagenda", array("textarea_name" => "investment_agenda")); ?>
        </p>

        <p>
            <label for="matriculationagenda">Taxa de Inscrição: </label><br/>
            <?php wp_editor($matriculation_agenda, "matriculationagenda", array("textarea_name" => "matriculation_agenda")); ?>
        </p>

        <p>
            <label for="galleryagenda">Galeria: </label><br/>
            <?php wp_editor($gallery_agenda, "galleryagenda", array("textarea_name" => "gallery_agenda")); ?>
        </p>
        <p>
            <label for="dateagenda">Data: </label>
            <input type="text" name="date_agenda" id="dateagenda" class="date" value="<?php echo $date_agenda; ?>" />
        </p>
        <p>
            <label for="houragenda">Hora: </label>
            <input type="text" name="hour_agenda" id="houragenda" value="<?php echo $hour_agenda; ?>" />
        </p>
        <p>
            <label for="linkagenda">Apresentação: </label>
            <input type="text" name="link_agenda" id="linkagenda" class="url" style="width:600px" value="<?php echo $link_agenda; ?>" />
        </p>
        <p>
            <label for="contact_agenda">Contato: </label>
            <input type="text" name="contact_agenda" id="contact_agenda" class="url" style="width:600px" value="<?php echo $contact_agenda; ?>" />
        </p>
        <p>
            <label for="typeagenda">Tipo: </label>
            <select name="type_agenda" id="typeagenda">
                <option value="1" <?php echo ($type == 1) ? 'selected="selected"' : ''; ?>>Gratuito</option>
                <option value="2" <?php echo ($type == 2) ? 'selected="selected"' : ''; ?>>Pago</option>
            </select>    
        </p>
        
        <p>
            <label for="unitagenda">Unidade: </label>
            <select name="unit_agenda" id="unitagenda">
                <option value="">Selecione a Unidade</option>
        <?php foreach ($units as $key => $unit): ?>
                    <option value="<?php echo $key; ?>" <?php echo ($unitId == $key) ? 'selected="selected"' : ''; ?>><?php echo $unit; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="areaagenda">Área: </label>
            <select name="area_agenda" id="areaagenda">
                <option value="">Selecione a Área</option>
        <?php foreach ($areas as $key => $area): ?>
                    <option value="<?php echo $key; ?>" <?php echo ($areaId == $key) ? 'selected="selected"' : ''; ?>><?php echo $area; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="courseagenda">Curso: </label>
            <select name="course_agenda" id="courseagenda">
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
        if (isset($_POST['programing_agenda']))
            update_post_meta($postId, 'programing_agenda', $_POST['programing_agenda']);
        
        if (isset($_POST['investment_agenda']))
            update_post_meta($postId, 'investment_agenda', $_POST['investment_agenda']);
        
        if (isset($_POST['matriculation_agenda']))
            update_post_meta($postId, 'matriculation_agenda', $_POST['matriculation_agenda']);
        
        if (isset($_POST['gallery_agenda']))
            update_post_meta($postId, 'gallery_agenda', $_POST['gallery_agenda']);

        if (isset($_POST['link_agenda']))
            update_post_meta($postId, 'link_agenda', $_POST['link_agenda']);

        if (isset($_POST['date_agenda']))
            update_post_meta($postId, 'date_agenda', $_POST['date_agenda']);

        if (isset($_POST['hour_agenda']))
            update_post_meta($postId, 'hour_agenda', $_POST['hour_agenda']);

        if (isset($_POST['type_agenda']))
            update_post_meta($postId, 'type_agenda', $_POST['type_agenda']);

        if (isset($_POST['unit_agenda']))
            update_post_meta($postId, 'unit_agenda', $_POST['unit_agenda']);

        if (isset($_POST['area_agenda']))
            update_post_meta($postId, 'area_agenda', $_POST['area_agenda']);

        if (isset($_POST['course_agenda']))
            update_post_meta($postId, 'course_agenda', $_POST['course_agenda']);
        
        if (isset($_POST['contact_agenda']))
            update_post_meta($postId, 'contact_agenda', $_POST['contact_agenda']);
    }

}
?>