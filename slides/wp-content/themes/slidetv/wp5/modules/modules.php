<?php
class Modules{
    
    public function init($modules = array()){
        
        foreach($modules as $module){
            
            $this->loadModule($module);
            
        }
        
    }
    
    public function loadModule($module){
        
        require_once($module."/".$module.".php");
        
        eval("new ".ucfirst($module).";");
    }
    
}
?>