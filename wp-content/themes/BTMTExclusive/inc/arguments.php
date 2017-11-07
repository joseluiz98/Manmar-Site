<?php
$contributors = Contributors::getAllContributors(); 
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
$text_one = get_field('chamada_um_(en)', 'option');
$text_two = get_field('chamada_dois_(en)', 'option');
$text_three = get_field('chamada_tres_(en)', 'option');
$slogan = get_field('slogan_(en)','option');
$title_branches = get_field('titulo_lojas_(en)','option');
$title_blog = get_field('titulo_blog_(en)','option');
$title_Testimonials = get_field('titulo_depoimentos_(en)','option');
$ctNews = get_field('texto_call_to_action_newsletter_(en)','option');
$ctBlog = get_field('chamada_blog_(en)','option');
$textBt = get_field('texto_botao_newsletter_(en)','option');

// Fields FR
$text_one_fr = get_field('chamada_um_(fr)', 'option');
$text_two_fr = get_field('chamada_dois_(fr)', 'option');
$text_three_fr = get_field('chamada_tres_(fr)', 'option');
$slogan_fr = get_field('slogan_(fr)','option');
$title_branches_fr = get_field('titulo_lojas_(fr)','option');  
$title_blog_fr = get_field('titulo_blog_(fr)','option');
$title_Testimonials_fr = get_field('titulo_depoimentos_(fr)','option');
$ctNews_fr = get_field('texto_call_to_action_newsletter_(fr)','option');
$ctBlog_fr = get_field('chamada_blog_(fr)','option');
$textBt_fr = get_field('texto_botao_newsletter_(fr)','option');

// Fields PT
$text_one_pt = get_field('chamada_um_(pt)', 'option');
$text_two_pt = get_field('chamada_dois_(pt)', 'option');
$text_three_pt = get_field('chamada_tres_(pt)', 'option');
$slogan_pt = get_field('slogan_(pt)','option');
$title_branches_pt = get_field('titulo_lojas_(pt)','option');
$title_blog_pt = get_field('titulo_blog_(pt)','option');
$title_Testimonials_pt = get_field('titulo_depoimentos_(pt)','option');
$ctNews_pt = get_field('texto_call_to_action_newsletter_(pt)','option');
$ctBlog_pt = get_field('chamada_blog_(pt)','option');
$textBt_pt = get_field('texto_botao_newsletter_(pt)','option');

// -------------------------------------------------------------------//

//Campos Auxiliares Sobre
$img_en_1 = get_field('imagem_topico_1','option');
$img_en_2 = get_field('imagem_topico_2','option');
$img_en_3 = get_field('imagem_topico_3','option');
$img_en_4 = get_field('imagem_topico_4','option');
$img_en_5 = get_field('imagem_topico_5','option');
$mission_en = get_field('missao','option');
$topic_en_1 = get_field('topico_1','option');
$topic_en_2 = get_field('topico_2','option');
$topic_en_3 = get_field('topico_3','option');
$topic_en_4 = get_field('topico_4','option');
$topic_en_5 = get_field('topico_5','option');
$number = get_field('numero_detalhe','option');
$text = get_field('texto_detalhe','option');
$team_en = get_field('equipe','option');


$img_fr_1 = get_field('imagem_topico_fr_1','option');
$img_fr_2 = get_field('imagem_topico_fr_2','option');
$img_fr_3 = get_field('imagem_topico_fr_3','option');
$img_fr_4 = get_field('imagem_topico_fr_4','option');
$img_fr_5 = get_field('imagem_topico_fr_5','option');
$mission_fr = get_field('missao_fr','option');
$topic_fr_1 = get_field('topico_fr_1','option');
$topic_fr_2 = get_field('topico_fr_2','option');
$topic_fr_3 = get_field('topico_fr_3','option');
$topic_fr_4 = get_field('topico_fr_4','option');
$topic_fr_5 = get_field('topico_fr_5','option');
$number_fr = get_field('numero_detalhe_fr','option');
$text_fr = get_field('texto_detalhe_fr','option');
$team_fr = get_field('equipe_fr','option');


$img_pt_1 = get_field('imagem_topico_pt_1','option');
$img_pt_2 = get_field('imagem_topico_pt_2','option');
$img_pt_3 = get_field('imagem_topico_pt_3','option');
$img_pt_4 = get_field('imagem_topico_pt_4','option');
$img_pt_5 = get_field('imagem_topico_pt_5','option');
$mission_pt = get_field('missao-pt','option');
$topic_pt_1 = get_field('topico_pt_1','option');
$topic_pt_2 = get_field('topico_pt_2','option');
$topic_pt_3 = get_field('topico_pt_3','option');
$topic_pt_4 = get_field('topico_pt_4','option');
$topic_pt_5 = get_field('topico_pt_5','option');
$number_pt = get_field('numero_detalhe_pt','option');
$text_pt = get_field('texto_detalhe_pt','option');
$team_pt = get_field('equipe_pt','option');
// -------------------------------------------------------------------//


//Campos Auxiliares Lojas
// $field_bt_anspach= "field_59afed0a39ff1";
// $bt_anspach = get_field_object($field_bt_anspach);  

// $field_parvis_saint = "field_59afedb78ccaf";
// $bt_parvis_saint_gilles = get_field_object($field_parvis_saint);  

// $field_bt_place_flagey = "field_59afedd8549ee";
// $bt_place_flagey = get_field_object($field_bt_place_flagey);  

// $field_bt_barriere_saint_gilles = "field_59afedf293097";
// $bt_barriere_saint_gilles = get_field_object($field_bt_barriere_saint_gilles);  

// $field_bt_antwerpen = "field_59afee087ff72";
// $bt_antwerpen = get_field_object($field_bt_antwerpen);  

// $field_bt_midi= "field_59afee205534e";
// $bt_midi = get_field_object($field_bt_midi);  

// $field_bt_place_bara = "field_59afee30b0437";
// $bt_place_bara = get_field_object($field_bt_place_bara);  
?>