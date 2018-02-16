<?php
class User_roles{
    
    public function __construct(){
        
        add_role("estagio","Estágio",array(
            "read" => true,
            "read_units" => true,
            "edit_others_posts"=>true,
            "edit_published_posts"=>true,
            "delete_posts"=>true,
            "edit_posts"=>true
        ));
        
        add_role("rh","RH",array(
            "read" => true,
            "read_units" => true,
            "edit_others_posts"=>true,
            "edit_published_posts"=>true,
            "delete_posts"=>true,
            "edit_posts"=>true,
            "read_private_pages"=>true,
            "edit_pages"=>true,
            "edit_others_pages"=>true,
            "edit_private_pages"=>true,
            "delete_pages"=>true
        ));

        $this->setRoles();
        
        add_action( 'show_user_profile', array(&$this,'profile_fields' ));
        add_action( 'edit_user_profile', array(&$this,'profile_fields' ));
        
        add_action( 'personal_options_update', array(&$this,'save_profile_fields'));
        add_action( 'edit_user_profile_update', array(&$this,'save_profile_fields'));
        
        add_filter('parse_query',array(&$this,"restrict_access_unit"));
        
        add_action('admin_menu', array(&$this, "removeMenuItens"));
        
    }
    
    public function setRoles(){

        //Rh
        $rh = get_role('rh');      
        $rh->add_cap('edit_others_posts');
        $rh->add_cap('edit_published_posts');      
        $rh->add_cap('read_private_pages');
        $rh->add_cap('edit_pages');
        $rh->add_cap('edit_others_pages');
        $rh->add_cap('edit_private_pages');
        $rh->add_cap('delete_pages');

        //Estágio
        $estagio = get_role('estagio');
        $estagio->add_cap('edit_others_posts');
        $estagio->add_cap('edit_published_posts');   
        
    }
    
    public function removeMenuItens(){
        
        $current_user = wp_get_current_user();
        
        if(isset($current_user->caps["Estágio"])):
            
            remove_menu_page('edit.php?post_type=courses');
            remove_menu_page('edit.php?post_type=graduations');
            remove_menu_page('edit.php?post_type=eads');
            remove_menu_page('edit.php?post_type=phds');
            remove_menu_page('edit.php?post_type=projects');
            remove_menu_page('edit.php?post_type=extensions');
            remove_menu_page('edit.php?post_type=highlights');
            remove_menu_page('edit.php?post_type=events');
            remove_menu_page('edit.php?post_type=agendas');
            remove_menu_page('edit.php?post_type=finance_course');
            remove_menu_page('edit.php?post_type=videos');
            remove_menu_page('edit.php?post_type=units');
            remove_menu_page('edit.php?post_type=areas');
            remove_menu_page('edit.php?post_type=coordinators');
            remove_menu_page('edit.php?post_type=levels');
            remove_menu_page('edit.php?post_type=testimonials');
            remove_menu_page('edit.php?post_type=publications');
            remove_menu_page('edit.php?post_type=admissions');
            remove_menu_page('edit.php?post_type=shortcuts');
            remove_menu_page('admin.php?page=list-newsletter');
            remove_menu_page('tools.php');
            remove_menu_page('edit.php');
            
        elseif(isset($current_user->caps["rh"])):
            
            remove_menu_page('edit.php?post_type=courses');
            remove_menu_page('edit.php?post_type=vacancies');
            remove_menu_page('edit.php?post_type=graduations');
            remove_menu_page('edit.php?post_type=eads');
            remove_menu_page('edit.php?post_type=phds');
            remove_menu_page('edit.php?post_type=projects');
            remove_menu_page('edit.php?post_type=extensions');
            remove_menu_page('edit.php?post_type=highlights');
            remove_menu_page('edit.php?post_type=events');
            remove_menu_page('edit.php?post_type=agendas');
            remove_menu_page('edit.php?post_type=finance_course');
            remove_menu_page('edit.php?post_type=videos');
            remove_menu_page('edit.php?post_type=units');
            remove_menu_page('edit.php?post_type=areas');
            remove_menu_page('edit.php?post_type=coordinators');
            remove_menu_page('edit.php?post_type=levels');
            remove_menu_page('edit.php?post_type=testimonials');
            remove_menu_page('edit.php?post_type=publications');
            remove_menu_page('edit.php?post_type=admissions');
            remove_menu_page('edit.php?post_type=shortcuts');
            remove_menu_page('tools.php');
            remove_menu_page('edit.php');
            
        endif;
    }
    
    public function profile_fields( $user ) { 
        
        $units = Units::getListUnits();
        
        $current_user = wp_get_current_user();
        
        if(isset($current_user->caps["administrator"])&&($current_user->caps["administrator"]==1)){
        
    ?>
    
    <table class="form-table">
        <tr>
            <th><label for="twitter">Unidade</label></th>
 
            <td>
                <select name="unit_profile">
                    <option value="all" <?php echo (get_the_author_meta( 'unit_profile', $user->ID )=="all") ? 'selected="selected"' : '';?>>Todas</option>
                    <?php foreach($units as $key => $unit):?>
                    <option value="<?php echo $key;?>" <?php echo (get_the_author_meta( 'unit_profile', $user->ID )==$key) ? 'selected="selected"' : '';?>><?php echo $unit;?></option>
                    <?php endforeach;?>
                </select>
            </td>
        </tr>
    </table>

<?php } }

    public function save_profile_fields( $userId ) {
 
        if ( !current_user_can( 'edit_user', $userId ) )
            return false;

        update_usermeta( $userId, 'unit_profile', $_POST['unit_profile'] );
    }
    
    public function restrict_access_unit($query){
        
        if(isset($_GET['action']) && $_GET['action']=='edit'){
            $post_type = null;
        }else{
            $post_type = (isset($_GET["post_type"])) ? $_GET["post_type"] : 'posts';
            
        }
        
        if(is_admin() && preg_match("/^(posts|courses|events|highlights)/", $post_type)){
            
            
            $current_user = wp_get_current_user();
            $unit_profile = get_user_meta($current_user->data->ID,"unit_profile",true);
           
            if($unit_profile!="" && $unit_profile!="all"){
                
                switch($post_type){
                    
                    case 'courses':
                        $key = "unit_course";
                    break;
                
                    case 'posts':
                        $key = "unit_news";
                    break;
                
                    case 'highlights':
                        $key = "unit_highlight";
                    break;
                
                    case 'events':
                        $key = "unit_event";
                    break;
                
                    default : $key=null; break;
                    
                }
                if($key){
                    $query->query_vars["meta_query"][] = array(
                    "key" => $key,
                    "compare"=>"=",
                    "value"=>$unit_profile
                    );
                }
                
            }
        }
        
        return $query;
        
    }
}
?>