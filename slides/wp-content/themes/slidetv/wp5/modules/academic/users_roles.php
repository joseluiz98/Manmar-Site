<?php
class UsersRoles{
    
    public function __construct(){
        
        add_role("marketing","Marketing",array(
            "read" => true,
            "edit_posts" => true,
            "publish_posts" => true,
            "delete_posts" => true
        ));
        
        add_action( 'show_user_profile', array(&$this,'profile_fields' ));
        add_action( 'edit_user_profile', array(&$this,'profile_fields' ));
        
        add_action( 'personal_options_update', array(&$this,'save_profile_fields'));
        add_action( 'edit_user_profile_update', array(&$this,'save_profile_fields'));
        
        add_filter('parse_query',array(&$this,"restrict_access_unit"));
        
    }
    
    public function profile_fields( $user ) { 
        
        $units = Units::getListUnits();
        
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

<?php }

    public function save_profile_fields( $userId ) {
 
        if ( !current_user_can( 'edit_user', $userId ) )
            return false;

        update_usermeta( $userId, 'unit_profile', $_POST['unit_profile'] );
    }
    
    public function restrict_access_unit($query){
        
        $post_type = (isset($_GET["post_type"])) ? $_GET["post_type"] : 'posts';
        
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