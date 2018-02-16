<?php
class User_roles{
    
    public function __construct(){
        
        add_role("marketing","Marketing",array(
            "read" => true,
            "read_units" => true,
            "edit_others_posts"=>true,
            "edit_published_posts"=>true,
            "delete_posts"=>true,
            "edit_posts"=>true
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
        
        $role = get_role('marketing');
        
        $role->add_cap('edit_others_posts');
        $role->add_cap('edit_published_posts');
        
    }
    
    public function removeMenuItens(){
        
        $current_user = wp_get_current_user();
        
        if(isset($current_user->caps["marketing"])&&($current_user->caps["marketing"])){
            
            remove_menu_page('edit.php?post_type=highlights');
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
            remove_menu_page('admin.php?page=list-newsletter');
            
        }
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
