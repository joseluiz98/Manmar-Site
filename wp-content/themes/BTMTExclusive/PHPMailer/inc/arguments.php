<?php 

$highlights = Highlights::getAllHighlights();

$proposals = Proposals::getAllProposals();

$videos = Videos::getAllVideos();

$materials = Materials::getAllMaterials();

$press = Press::getAllPress();

$news= News::getAllNews();

$materialshome = new WP_Query( 
    array(
    'post_type' => 'materials',  
    'orderby' => 'meta_value', 
    'order' => 'DESC',    
    'posts_per_page' => 1
    )
);

$newshome = new WP_Query( 
    array(
    'post_type' => 'post',  
    'orderby' => 'meta_value', 
    'order' => 'DESC',    
    'posts_per_page' => 1
    )
);

$proposalshome = new WP_Query( 
    array(
    'post_type' => 'proposals',  
    'orderby' => 'meta_value', 
    'order' => 'DESC',    
    'posts_per_page' => 1
    )
);
?>