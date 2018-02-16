<?php
class Newsletter{
    
    public function Newsletter(){
        
        if(isset($_GET["page"]) && ($_GET["page"] == "export-newsletter")){
            
            if(isset($_GET["action"]) && $_GET["action"] == "export-selecteds"){
                
                if(isset($_POST["news"])){
                    self::exportNewsletterById($_POST);
                }else{
                    die();
                }
            }else{

                self::exportNewsletter();
            }
 
        }
        
        add_action('admin_menu',array(&$this,"createAdminPage"));
        
    }
    
    public function createAdminPage(){
        
        
            add_menu_page('Newsletter','Newsletter','edit_posts','list-newsletter',array("Newsletter","adminPage"),get_bloginfo("stylesheet_directory").'/wp5/img/icon-newsletter.png');
        
    }
    
    public function adminPage(){
        
        if(!empty($_POST)){
            self::updateNewsletter($_POST);
        }
        
        if(isset($_GET["action"]) && $_GET["action"]=="delete"){
            self::deleteNewsletter($_GET["newsid"]);
        }
        
        require_once('list-page.php');
        
    }
    
    public function saveNewsletter($data){
        
        
        global $wpdb;
       
        //print_r($data);
             
        foreach($data as $key => $value){
           
            $$key = mysql_real_escape_string($value);
        }
        
        if((isset($name)&&(!empty($name)) && (isset($email) && (!empty($email))))){
            if(self::checkEmail($email)){

                return $wpdb->query("INSERT INTO wp5_newsletter VALUES('','".$name."','".$email."',NOW())");
                                
            }else{

                return false; 
            }
        }
    }
    
    public function updateNewsletter($data){
        
        global $wpdb;
        
        extract($data);
        
        $wpdb->query("UPDATE wp5_newsletter SET name = '".$name."', email= '".$email."' WHERE id = '".$id."'");
        
    }
    
    public function getNewsletter($orderby,$order){
     
        
        global $wpdb;
        
        $data = $wpdb->get_results("SELECT * FROM wp5_newsletter ORDER BY ".$orderby." ".$order);
        
        return $data;
        
    }
    
    public function getNewsletterById($id){
        
        global $wpdb;
        
        return $wpdb->get_results("SELECT * FROM wp5_newsletter WHERE id = '".$id."'");
        
    }
    
    public function deleteNewsletter($id){
        global $wpdb;
        
        $wpdb->query("DELETE FROM wp5_newsletter WHERE id = '".$id."'");
        
    }
    
    public function checkEmail($email){
        
        global $wpdb;
        
        if(preg_match("/^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+$/", $email)){
            
            $query = $wpdb->get_results("SELECT id FROM wp5_newsletter WHERE email = '".$email."'");
            
            if(count($query)==0){
                
                return true;
                
            }
            
            return false;
            
        }else{
            return false;
        }
        
    }
    
    public function exportNewsletter(){
        
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=newsletter.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        
        
        global $wpdb;
        
        $data = $wpdb->get_results("SELECT * FROM wp5_newsletter");
        
        echo "Nome;Email\n";
        
        foreach($data as $item){
            echo $item->name.";".$item->email."\n";
        }
        
        die();
    }
    
    public function exportNewsletterById($data){
        
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=newsletter.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        $ids = implode(",",$data["news"]);
        
        global $wpdb;
        
        $data = $wpdb->get_results("SELECT * FROM wp5_newsletter WHERE id IN(".$ids.")");
        
        echo "Nome;Email\n";
        
        foreach($data as $item){
            echo $item->name.";".$item->email."\n";
        }
        
        die();
    }
    
}
?>
