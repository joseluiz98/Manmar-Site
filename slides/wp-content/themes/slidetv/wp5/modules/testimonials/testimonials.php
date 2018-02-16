<?php
class Testimonials{
    
    public function Testimonials(){
       
        $this->createCustomPostType();
        
    }
    
    public function getTestimonials($options = array()){
        
        
        $args = array("post_type"=>"testimonials","orderby"=>"post_date","order"=>"DESC","posts_per_page"=>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
        return new WP_Query($args);
        
    }
    
    public function getTestimonialsByMeta($meta , $value , $limit = 100){
        
        global $wpdb;
        
        $data = $wpdb->get_results('SELECT post_id , meta_key , meta_value , Post.ID , Post.post_title , Post.post_date , Post.guid FROM wp_postmeta
                                    INNER JOIN wp_posts AS Post ON(Post.ID = post_id)
                                    WHERE meta_key = "'.$meta.'" AND meta_value = "'.$value.'"
                                    LIMIT '.$limit);
      
        
        return $data;
        
    }
    
    
    
    public function createCustomPostType(){
        
        register_post_type('testimonials', array(	
            'label' => 'Depoimentos',
            'description' => 'Cadastro de Depoimentos',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => ''),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title','editor','thumbnail','page-attributes'),
            'menu_icon' => get_bloginfo("stylesheet_directory").'/wp5/img/icon-highlights.png',
            'labels' => array (
                'name' => 'Depoimentos',
                'singular_name' => 'Depoimento',
                'menu_name' => 'Depoimentos',
                'add_new' => 'Novo Depoimento',
                'add_new_item' => 'Novo Depoimento',
                'edit' => 'Editar',
                'edit_item' => 'Editar Depoimento',
                'new_item' => 'Novo Depoimento',
                'view' => 'Ver Depoimento',
                'view_item' => 'Ver Depoimentos',
                'search_items' => 'Buscar Depoimentos',
                'not_found' => 'No Depoimentos Found',
                'not_found_in_trash' => 'No Depoimentos Found in Trash',
                'parent' => 'Parent Depoimento',
            ),
        ));
        
        
        add_action( 'add_meta_boxes', array( &$this, 'addCustomFields' ) );
        add_action( 'save_post', array( &$this, 'saveCustomFields' ) );
  
    }
    
    public function addCustomFields(){
        add_meta_box("testimonialsCustomFields","Dados Depoimentos",array(&$this,"formCustomFields"),"testimonials","normal","low");
        
    }
    
    public function formCustomFields(){
        
        global $post;
        
        $data = get_post_custom($post->ID);
        
        $about = (isset($data["about_testimonial"])) ? $data["about_testimonial"][0] : '';
        $unitId = (isset($data["unit_testimonial"])) ? $data["unit_testimonial"][0] : '';
        $areaId = (isset($data["area_testimonial"])) ? $data["area_testimonial"][0] : '';
        $courseId = (isset($data["course_testimonial"])) ? $data["course_testimonial"][0] : '';
    
        wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
        
        $areas = Areas::getListAreas();
        
        $courses = Courses::getListCourses();
        
        $units = Units::getListUnits();
        
        
        ?>    
        <p>
            <label for="aboutTestimonial">Sobre: </label>
            <input type="text" name="about_testimonial" id="aboutTestimonial" style="width:400px" value="<?php echo $about;?>" />
        </p>
        <p>
            <label for="areaTestimonial">Área: </label>
            <select name="area_testimonial" id="areaTestimonial">
                <option value="">Selecione a Área</option>
                <?php foreach($areas as $key => $area):?>
                <option value="<?php echo $key;?>" <?php echo ($areaId==$key) ? 'selected="selected"' : '';?>><?php echo $area;?></option>
                <?php endforeach;?>
            </select>
        </p>
        <p>
            <label for="courseTestimonial">Curso: </label>
            <select name="course_testimonial" id="courseTestimonial">
                <option value="">Selecione o Curso</option>
                <?php foreach($courses as $key => $course):?>
                <option value="<?php echo $key;?>" <?php echo ($courseId==$key) ? 'selected="selected"' : '';?>><?php echo $course;?></option>
                <?php endforeach;?>
            </select>
        </p>
        <p>
            <label for="unitTestimonial">Unidade: </label>
            <select name="unit_testimonial" id="unitTestimonial">
                <option value="">Selecione a Unidade</option>
                <?php foreach($units as $key => $unit):?>
                <option value="<?php echo $key;?>" <?php echo ($unitId==$key) ? 'selected="selected"' : '';?>><?php echo $unit;?></option>
                <?php endforeach;?>
            </select>
        </p>
    <?php
    
    }
    
    public function saveCustomFields($postId){
        
        // Verificando se é um AUTOSAVE
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 

        // if our nonce isn't there, or we can't verify it, bail 
        if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return; 

        //verificando se o usuário pode editar o post
        if( !current_user_can( 'edit_post' ) ) return; 


        // Salvando dados do formulário
        if( isset( $_POST['about_testimonial'] ) )  
            update_post_meta( $postId, 'about_testimonial',$_POST['about_testimonial']);  

        if( isset( $_POST['area_testimonial'] ) )  
            update_post_meta( $postId, 'area_testimonial', $_POST['area_testimonial']);

        if( isset( $_POST['course_testimonial'] ) )  
            update_post_meta( $postId, 'course_testimonial', $_POST['course_testimonial']);
        
        if( isset( $_POST['unit_testimonial'] ) )  
            update_post_meta( $postId, 'unit_testimonial', $_POST['unit_testimonial']);
    
    }
    
    
    
}

?>
