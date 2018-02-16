<?php
require_once('src/basics.php');
require_once('src/admin.php');
require_once('modules/modules.php');
    
class WP5{
    
    public function WP5(){
        
        $adminMenu = new Admin;
        $adminMenu->init();
        
        $modules = new Modules;
        $modules->init(
        	array(
	        	//"highlights",
	        	//"events",
	        	//"newsletter",
	        	//"videos",
	        	"academic"
	        	//"testimonials",
	        	//"shortcuts",
	        	//"publications",
	        	//"news",
	        	//"admission_process",
	        	//"user_roles",
	        	//"researches",
	        	//"projects"
	        )
    	);
        
    }
    
} 

?>