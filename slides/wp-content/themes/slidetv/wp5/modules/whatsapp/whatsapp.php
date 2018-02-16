<?php
class Whatsapp{
    
    public function Whatsapp(){
        
        if(isset($_GET["page"]) && ($_GET["page"] == "export-whatsapp")){
            
            if(isset($_GET["action"]) && $_GET["action"] == "export-selecteds"){
                
                if(isset($_POST["whats"])){
                    self::exportWhatsappById($_POST);
                }else{
                    die();
                }
            }else{

                self::exportWhatsapp();
            }
 
        }
        
        add_action('admin_menu',array(&$this,"createAdminPage"));
    }

    public function createAdminPage(){
        
        
            add_menu_page('Whatsapp','Whatsapp','edit_posts','list-whatsapp',array("Whatsapp","adminPage"),get_bloginfo("stylesheet_directory").'/wp5/img/media_16.png');
    }

    public function adminPage(){
        
        if(!empty($_POST)){
            self::updateWhatsapp($_POST);
        }
        
        if(isset($_GET["action"]) && $_GET["action"]=="delete"){
            self::deleteWhatsapp($_GET["whatsid"]);
        }
        
        require_once('list-page.php');        
    }

    public function saveWhatsapp($data){
        
        
        global $wpdb;
        
        foreach($data as $key => $value){
           
            $$key = mysql_real_escape_string($value);
        }
        
        if((isset($number_whatsapp)&&(!empty($number_whatsapp)) && (isset($nameFile) && (!empty($nameFile))))){

            return $wpdb->query("INSERT INTO rdp_contact_whatsapp VALUES('','".$number_whatsapp."','".$nameFile."',NOW())");
                                
        }else{

            return false; 
        }
    }
    
    public function updateWhatsapp($data){
        
        global $wpdb;
        
        extract($data);

        $wpdb->query("UPDATE rdp_contact_whatsapp SET number_whatsapp = '".$name."', nameFile= '".$email."' WHERE id = '".$id."'");
    }

    public function getWhatsapp($orderby,$order){
     
        
        global $wpdb;
        
        $data = $wpdb->get_results("SELECT * FROM rdp_contact_whatsapp ORDER BY ".$orderby." ".$order);
        
        return $data;
    }

    public function getWhatsappById($whatsid){
        
        global $wpdb;
        
        return $wpdb->get_results("SELECT * FROM rdp_contact_whatsapp WHERE id = '".$whatsid."'");
    }
    
    public function deleteWhatsapp($whatsid){
        global $wpdb;
        
        $wpdb->query("DELETE FROM rdp_contact_whatsapp WHERE id = '".$whatsid."'");
    }

    public function checkNumber($number_whatsapp){
        
        global $wpdb;
        
        $exp_regular = '/^(\(11\) (9\d{4})-\d{4})|((\(1[2-9]{1}\)|\([2-9]{1}\d{1}\)) [5-9]\d{3}-\d{4})$/';
        $ret = preg_match($exp_regular, $number);

        if($ret){
            
            $query = $wpdb->get_results("SELECT id FROM rdp_contact_whatsapp WHERE number_whatsapp = '".$number."'");
            
            if(count($query)==0){
                
                return true;
                
            }
            
            return false;
            
        }else{
            return false;
        }
    }

    public function exportWhatsapp(){
        
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=whatsapp.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        
        
        global $wpdb;
        
        $data = $wpdb->get_results("SELECT * FROM rdp_contact_whatsapp");
        
        echo "Numero\n";
        
        foreach($data as $item){
            echo $item->number_whatsapp."\n";
        }
        
        die();
    }
    
    public function exportWhatsappById($data){
        
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=whatsapp.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        $ids = implode(",",$data["whatsid"]);
        
        global $wpdb;
        
        $data = $wpdb->get_results("SELECT * FROM rdp_contact_whatsapp WHERE id IN(".$ids.")");
        
        echo "Numero\n";
        
        foreach($data as $item){
            echo $item->number_whatsapp."\n";
        }
        
        die();
    }
}
?>
