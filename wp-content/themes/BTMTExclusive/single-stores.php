<?php get_header(); the_post();
$img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
$address = get_post_meta(get_the_ID(),'endereco',true);
$lat = get_post_meta(get_the_ID(),'latitude',true);
$long = get_post_meta(get_the_ID(),'longitude',true);
?>
<style>
        #right-panel {
          font-family: 'Roboto','sans-serif';
          line-height: 30px;
          padding-left: 10px;
        }

        #right-panel select, #right-panel input {
          font-size: 15px;
        }

        #right-panel select {
          width: 50%;
        }

        #right-panel i {
          font-size: 12px;
        }
        #map {
          float: left;
          width: 100%;
          height: 340px;
        }
        #direcao{
          display: none;
          float: left; 
          width: 50%; 
          height: 340px; 
          overflow-y: scroll;
        }
        #directionsPanel{
          width: 100%;
          height:100px
        }
        .adp-placemark{
          margin: 0 !important;
        }
        #right-panel {
          border-width: 2px;
          width: 100%;
          float: left;
          text-align: left;
          padding: 15px;
          background: #aad934;
        }
        #directions-panel {
          margin-top: 10px;
          background-color: #FFEE77;
          padding: 10px;
        }
     
    </style>
<section id="contact" class="interns">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
        	 	<div class="col-xs-12 col-sm-12 col-md-12 content-blog singleTitle">
	                <h2 class=""><?php the_title(); ?></h2>
                    <p class="address"><?php echo get_post_meta(get_the_id(),'endereço', true); ?></p>
    	        </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-md-4 location single_branche">
                        <div class="block">
                            <?php
                                $codLang = ICL_LANGUAGE_CODE; 
                                switch ($codLang) {
                                    case 'pt-br':
                                        echo '<h3>Horário de Funcionamento</h3>';
                                        break;
                                    case 'fr':
                                        echo "<h3>heures d'ouverture</h3>"; 
                                    break;
                                    default:
                                        echo '<h3>Opening Hours</h3>';
                                        break;
                                }
                            ?>
                            <p>
                                <span class="fa fa-clock-o" aria-hidden="true">
                                <?php 
                                    switch ($codLang) {
                                        case 'pt-br':
                                            echo '<span class="times">Seg - Sex: </span>';
                                            break;
                                        case 'fr':
                                            echo '<span class="times">Lundi - Vendredi: </span>'; 
                                        break;
                                        default:
                                            echo '<span class="times">Monday - Friday: </span>';
                                            break;
                                    }
                                ?>   
                                </span><?php echo get_post_meta(get_the_id(),'workingDays', true); ?>
                            </p>
                            <p>
                                <span class="fa fa-clock-o" aria-hidden="true">
                                    <?php 
                                        switch ($codLang) {
                                            case 'pt-br':
                                                echo '<span class="times">Sábado: </span>';
                                                break;
                                            case 'fr':
                                                echo '<span class="times">Samedi: </span>'; 
                                            break;
                                            default:
                                                echo '<span class="times">Saturday: </span>';
                                                break;
                                        }
                                    ?>
                                </span><?php echo get_post_meta(get_the_id(),'saturday', true); ?></p>
                            <p>
                                <span class="fa fa-clock-o" aria-hidden="true">
                                    <?php 
                                        switch ($codLang) {
                                            case 'pt-br':
                                                echo '<span class="times">Domingo: </span>';
                                                break;
                                            case 'fr':
                                                echo '<span class="times">Dimanche: </span>'; 
                                            break;
                                            default:
                                                echo '<span class="times">Sunday: </span>';
                                                break;
                                        }
                                    ?>
                                </span><?php echo get_post_meta(get_the_id(),'sunday', true); ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-8 content-blog the_content">
                        <p><?php the_content(); ?></p>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="right-panel">

      <div>
        <!-- <b>Start:</b> -->
        <!-- <select id="start">
          <option value="Rue Malibran">Halifax, NS</option>
          <option value="Boston, MA">Boston, MA</option>
          <option value="New York, NY">New York, NY</option>
          <option value="Miami, FL">Miami, FL</option>
        </select> -->
        <!-- <input type="hidden" id="end" value="<?php echo get_post_meta(get_the_id(),'endereço', true); ?>">
        <input type="text" id="start" value="">
         <input type="hidden" id="end" value="BRUXELLES"> -->
        <!-- <input type="submit" id="submit">  -->
        <?php 

        $codLang = ICL_LANGUAGE_CODE;
        switch ($codLang) {
            case 'pt-br':
                $placeholder = 'Digite sua localização!';
                $textButton = 'Traçar Rota';
                break;
            case 'fr':
                $placeholder = 'Entrez votre emplacement!'; 
                $textButton = 'Trace Route';
            break;
            default:
                $placeholder = 'Enter your location!';
                $textButton = 'Trace Route';
                break;
        }

        ?>
        <div class="col-md-6 col-md-offset-3"> 
            <div class="input-group"> 
                <input class="form-control" placeholder="<?php echo $placeholder; ?>" aria-label="<?php echo $placeholder; ?>" type="text" id="start" value="" style="margin-bottom:0;">
                <input type="hidden" id="end" value="<?php echo get_post_meta(get_the_id(),'endereço', true); ?>">
                <div class="input-group-btn"> 
                    <button type="submit" id="submit" class="btn btn-default"><?php echo $textButton; ?></button>  
                </div> 
            </div> 
        </div>
      </div>
     <!--  <div id="directions-panel"></div> -->

    </div>
            <!-- <input id="origin-input" class="controls" type="text" placeholder="Enter an origin location" style="width: 150px;">

            <input id="destination-input" class="controls" type="text" placeholder="Enter a destination location" style="width: 150px;" value="<?php //echo get_post_meta(get_the_id(),'endereço', true); ?>">

            <div id="mode-selector" class="controls">
              <input type="radio" name="type" id="changemode-walking" checked="checked">
              <label for="changemode-walking">Walking</label>

              <input type="radio" name="type" id="changemode-transit">
              <label for="changemode-transit">Transit</label>

              <input type="radio" name="type" id="changemode-driving">
              <label for="changemode-driving">Driving</label>
            </div> -->
           <!--  <div id="map" data-lat="<?php echo$lat; ?>" data-long="<?php echo$long; ?>" data-title="<?php echo the_title(); ?>"></div> -->

            <div id="mapview">
                <div id="map" data-lat="<?php echo$lat; ?>" data-long="<?php echo$long; ?>" data-title="<?php echo the_title(); ?>"></div>
                <div id="direcao">
                    <div id="directionsPanel"></div>
                </div>
            </div>
    </div>
    <div class="row">

           <!-- <div id="map_canvas" data-lat="<?php echo$lat; ?>" data-long="<?php echo$long; ?>" data-title="<?php echo the_title(); ?>"></div> -->

        <div class="col-md-12">
            <div class="container">
            <?php

                $images = get_field('image');
                if($images): 
                    ?>
                    <div class="container">
                        <div class="col-xs-12 col-sm-12 col-md-12 pictures">
                            <ul>
                                <?php 
                                foreach( $images as $image ): 
                                    ?>
                                    <div class="col-xs-12 col-md-3 list-gallery">
                                        <li>
                                            <a href="<?php echo $image['url']; ?>" data-lightbox="example-set" data-title="<?php echo $image['title']; ?>" data-toggle="lightbox">
                                                <div class="img">
                                                    <img src="<?php echo $image['url']; ?>" width="<?php echo $image['sizes']['medium-width']; ?>" height="<?php echo $image['sizes']['medium-height']; ?>" alt=""/>
                                                </div>
                                                <div class="caption">
                                                    <p><?php echo $image['title']; ?></p>
                                                </div>
                                            </a>
                                        </li>
                                    </div>
                                <?php 
                                endforeach; 
                                ?>
                            </ul>
                        </div>
                    </div>
                <?php 
                endif; 
            ?>
            </div>
        </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>