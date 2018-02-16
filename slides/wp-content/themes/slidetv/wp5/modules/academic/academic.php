<?php
require_once("units.php");
require_once("areas.php");
require_once("coordinators.php");
require_once("courses.php");
require_once("levels.php");
require_once("countries.php");


class Academic{

    public static $Countries = null;
    
    public static $Units = null;
    
    public static $Areas = null;
    
    public static $Coordinators = null;
    
    public static $Courses = null;
    
    public static $Levels = null;
    
    public function Academic(){

        $this->Countries = new Countries;
        
        $this->Units = new Units;
        
        $this->Areas = new Areas;
        
        $this->Coordinators = new Coordinators;
        
        $this->Courses = new Courses;
        
        $this->Levels = new Levels;
        
        $this->setCustomPosts();
        
    }
    
    public function setCustomPosts(){

        $this->Countries->createCustomPostType();
        
        $this->Units->createCustomPostType();
        
        $this->Areas->createCustomPostType();
        
        $this->Coordinators->createCustomPostType();
        
        $this->Courses->createCustomPostType();
        
        $this->Levels->createCustomPostType();
        
    }
    
    public function getUnits(){
        self::$Units = new Units();
        
        return self::$Units->getUnits();
    }
    
}
?>