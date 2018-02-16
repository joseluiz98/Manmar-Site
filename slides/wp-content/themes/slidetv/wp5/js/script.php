<?php
 header("Content-type: text/javascript");
?>
jQuery(document).ready(function(){
    
    
    jQuery("#dateEvent").datepicker({dateFormat: 'yy-mm-dd'});
    jQuery("#dateHighlight").datepicker({dateFormat: 'yy-mm-dd'});
    jQuery("#datePublication").datepicker({dateFormat: 'yy-mm-dd'});
    

    
    jQuery("#cbNews input").change(function(){
        if(jQuery(this).is(":checked")){
            jQuery(".check-column[scope=row] input").attr("checked","checked");
        }else{
            jQuery(".check-column[scope=row] input").removeAttr("checked")
        }
    });
    
    jQuery("form").attr('enctype','multipart/form-data');
    
    jQuery("#areaEvent").change(function(){
        
        /*jQuery.post(ajaxurl,{action:'my_action',area:jQuery(this).val()},function(response){
        
            alert(response);
        
        });*/
    });
   
});