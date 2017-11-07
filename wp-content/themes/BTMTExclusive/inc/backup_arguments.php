<?php 
$testimonials = Testimonials::getTestimonials();
$highlights = Highlights::getAllHighlights();
$partners = Services::getAllServices();
$stores = Stores::getStores();
$news = News::getAllNews();
$faqs = Faqs::getAllFaqs();

$teams = new WP_Query( 
    array(
    'post_type' => 'teams',  
    'orderby' => 'meta_value', 
    'order' => 'DESC',    
    'posts_per_page' => -1
    )
);
$newshomeHighlight = new WP_Query( 
    array(
    'post_type' => 'post',  
    'orderby' => 'meta_value', 
    'order' => 'DESC',    
    'posts_per_page' => 1
    )
);
$testimonialsHome = new WP_Query( 
    array(
    'post_type' => 'testimonials',  
    'orderby' => 'meta_value', 
    'order' => 'DESC',    
    'posts_per_page' => 1
    )
);
$newsHomeList = new WP_Query('showposts=4&offset=1');


//Campos Auxiliares Home
$icon_one = get_field('icone_one', 'option');
$icon_two = get_field('icone_two', 'option');
$icon_three = get_field('icone_three', 'option');
$whatsapp = get_field('whatsapp', 'option');
$call_center = get_field('call_center', 'option');

// Fields EN
$text_one = get_field('eye_one', 'option');
$text_two = get_field('eye_two', 'option');
$text_three = get_field('eye_three', 'option');
$slogan = get_field('slogan_(en)','option');

$slogan = get_field_object('field_59c542aebcb07');
$title_branches = get_field('titulo_lojas','option');
$title_blog = get_field('titulo_blog','option');
$title_Testimonials = get_field('titulo_depoimento','option');
$ctNews = get_field('text_call_to_action_newsletter','option');
$ctBlog = get_field('chamada_blog','option');
$textBt = get_field('texto_botao_newsletter','option');

// Fields FR
$text_one_fr = get_field('eye_one_fr', 'option');
$text_two_fr = get_field('eye_two_fr', 'option');
$text_three_fr = get_field('eye_three_fr', 'option');
$slogan_fr = get_field('slogan_fr','option');
$title_branches_fr = get_field('titulo_lojas_fr','option');
$title_blog_fr = get_field('titulo_blog_fr','option');
$title_Testimonials_fr = get_field('titulo_depoimentos_fr','option');
$ctNews_fr = get_field('text_call_to_action_newsletter_fr','option');
$ctBlog_fr = get_field('chamada_blog_fr','option');
$textBt_fr = get_field('texto_botao_newsletter_fr','option');

// Fields PT
$text_one_pt = get_field('eye_one_pt', 'option');
$text_two_pt = get_field('eye_two_pt', 'option');
$text_three_pt = get_field('eye_three_pt', 'option');
$slogan_pt = get_field('slogan_pt','option');
$title_branches_pt = get_field('titulo_lojas_pt','option');
$title_blog_pt = get_field('titulo_blog_pt','option');
$title_Testimonials_pt = get_field('titulo_depoimentos_pt','option');
$ctNews_pt = get_field('text_call_to_action_newsletter_pt','option');
$ctBlog_pt = get_field('chamada_blog_pt','option');
$textBt_pt = get_field('texto_botao_newsletter_pt','option');

// -------------------------------------------------------------------//

//Campos Auxiliares Sobre
$img_1 = get_field('imagem_topico_1');
$img_2 = get_field('imagem_topico_2');
$img_3 = get_field('imagem_topico_3');
$img_4 = get_field('imagem_topico_4');
$img_5 = get_field('imagem_topico_5');

// -------------------------------------------------------------------//

$field_bt_analitycs = "field_59c548769f201";
$analitycs = get_field_object($field_bt_analitycs); 

$analitycs = get_field('google_analitycs'); 


//Campos Auxiliares Lojas
$field_bt_anspach= "field_59afed0a39ff1";
$bt_anspach = get_field_object($field_bt_anspach);  

$field_parvis_saint = "field_59afedb78ccaf";
$bt_parvis_saint_gilles = get_field_object($field_parvis_saint);  

$field_bt_place_flagey = "field_59afedd8549ee";
$bt_place_flagey = get_field_object($field_bt_place_flagey);  

$field_bt_barriere_saint_gilles = "field_59afedf293097";
$bt_barriere_saint_gilles = get_field_object($field_bt_barriere_saint_gilles);  

$field_bt_antwerpen = "field_59afee087ff72";
$bt_antwerpen = get_field_object($field_bt_antwerpen);  

$field_bt_midi= "field_59afee205534e";
$bt_midi = get_field_object($field_bt_midi);  

$field_bt_place_bara = "field_59afee30b0437";
$bt_place_bara = get_field_object($field_bt_place_bara);  
?>

