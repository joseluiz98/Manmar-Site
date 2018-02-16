$(document).ready(function(){


    // Ícone hamburguer menu
    $(function() {
        "use strict";

        var toggles = document.querySelectorAll(".c-hamburger");

        for (var i = toggles.length - 1; i >= 0; i--) {
            var toggle = toggles[i];
            toggleHandler(toggle);
        }

        function toggleHandler(toggle) {
            toggle.addEventListener( "click", function(e) {
                e.preventDefault();
                (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
            });
        }
    });

    // // Envio do formulário de contato por ajax
    // $('#sendContato').click( function(){
      
    //     /* Coletando dados */
    //     var name       = $('#txtNameContact').val();
    //     var email      = $('#txtEmailContact').val();
    //     var phone      = $('#txtPhoneContact').val();
    //     var subject    = $('#txtSubjectContact').val();
    //     var message    = $('#txtMessageContact').val();

    //     var fc_name_contact = new Spry.Widget.ValidationTextField("fc_name_contact", "none", {validateOn:["blur", "change"]});
    //     var fc_email_contact = new Spry.Widget.ValidationTextField("fc_email_contact", "email", {validateOn:["blur", "change"]});
    //     var fc_subject_contact = new Spry.Widget.ValidationTextField("fc_subject_contact","none", {validateOn:["blur", "change"]});
    //     var fc_phone_contact = new Spry.Widget.ValidationTextField("fc_phone_contact", "none", {validateOn:["blur", "change"]});
    //     var fc_message_contact = new Spry.Widget.ValidationTextarea("fc_message_contact", {validateOn:["blur", "change"]});
      

    //     var valnome = fc_name_contact.validate();
    //     var valemail = fc_email_contact.validate();
    //     var valsubject = fc_subject_contact.validate();
    //     var valphone = fc_phone_contact.validate();
    //     var valmessage = fc_message_contact.validate();

    //     /* Validando */
    //     if(valnome && valemail && valsubject && valphone && valmessage){
   
    //         /* construindo url */
    //         var urlData = "&nome=" + name + "&email=" + email + "&subject=" + subject + "&phone=" + phone +"&msg=" + message ;
     
    //         /* Ajax */
    //         $.ajax({
    //             type: "POST",
    //             url: $themeUrl+"/send-contact.php",        /* endereço do script PHP */
    //             async: true,
    //             data: urlData,                              informa Url 
    //             success: function(data) {                  /* sucesso */
    //                 $('#retornoHTMLcontact').html(data);
    //             },
    //             beforeSend: function() {                   /* antes de enviar */
    //                 $('.loading').fadeIn('fast');
    //                 $('#sendContato').prop("disabled", true);
    //             },
    //             complete: function(){                      /* completo */
    //                 $('.loading').fadeOut('fast');
    //                 $('#formContato')[0].reset();
    //                 timer = setTimeout(function () {
    //                     $('#retornoHTMLcontact').addClass('hide');
    //                 }, 5000);
    //                 $('#sendContato').prop("disabled", false);
    //             }
    //         });
    //     }
    // });
   
    // //Scroll menu
    // $(window).scroll(function() {
       
    //    var containerHeight = $(".navbar-home").outerHeight(true);
    //    var scrollTopVal = $(this).scrollTop();

    //     if (scrollTopVal > containerHeight) {


    //     } else {


    //     }
    // });

    // var onsize = function() {

    //     var viewport = $(window).width();

    //     if(viewport > 768) {
            
    //     }else{
            
    //     }
    // };

    // $(window).resize(onsize);
    // onsize();

    // function detectBrowser() {
    //     var useragent = navigator.userAgent;
    //     var mapdiv = document.getElementById("map_canvas");

    //     if (useragent.indexOf('iPhone') != -1 || useragent.indexOf('Android') != -1 ) {
    //         mapdiv.style.width = '100%';
    //         mapdiv.style.height = '100%';
    //     } else {
    //         mapdiv.style.width = '600px';
    //         mapdiv.style.height = '800px';
    //     }
    // }

    // $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    //     event.preventDefault();
    //     $(this).ekkoLightbox();
    // });
});
// var $themeUrl = WPURLS.themeUrl;
// var locations = [
//     {
//         lat:  50.847335, 
//         lng:   4.348782,
//         info: "<div id='content'><div id='siteNotice'></div> <h1 id='firstHeading' class='firstHeading'><img src='dist/imgs/logo-footer.jpg' alt=''>ANSPACH  </h1><div id='bodyContent' class='bodyContent'><p class='address'><span class='glyphicon glyphicon-map-marker'></span>  Boulevard anspack, 118 1000 Bruxelles </p><p class='phone'><span class='glyphicon glyphicon-info-sign'></span>  02 880 24 90 </p> <p class='hour'><span class='fa fa-clock-o'></span> Funcionamento</p></div></div>"
//     }, {
//         lat:  50.832008, 
//         lng:   4.344018,
//         info: "<div id='content'><div id='siteNotice'></div> <h1 id='firstHeading' class='firstHeading'><img src='dist/imgs/logo-footer.jpg' alt=''>PARVIS SAINT-GILLES  </h1><div id='bodyContent' class='bodyContent'><p class='address'><span class='glyphicon glyphicon-map-marker'></span>  Avenue Jean Volders 58, 1060 Bruxelles </p><p class='phone'><span class='glyphicon glyphicon-info-sign'></span>  02 880 24 90 </p> <p class='hour'><span class='fa fa-clock-o'></span> Funcionamento</p></div></div>"
//     }, {
//         lat:  50.829812, 
//         lng:   4.373000,
//         info: "<div id='content'><div id='siteNotice'></div> <h1 id='firstHeading' class='firstHeading'><img src='dist/imgs/logo-footer.jpg' alt=''>PLACE FLAGEY  </h1><div id='bodyContent' class='bodyContent'><p class='address'><span class='glyphicon glyphicon-map-marker'></span>  Rue Malibran, 33, 1050 Bruxelles </p><p class='phone'><span class='glyphicon glyphicon-info-sign'></span>  02 880 24 90 </p> <p class='hour'><span class='fa fa-clock-o'></span> Funcionamento</p></div></div>"
//     }, {
//         lat:  50.825686, 
//         lng:   4.344102,
//         info: "<div id='content'><div id='siteNotice'></div> <h1 id='firstHeading' class='firstHeading'><img src='dist/imgs/logo-footer.jpg' alt=''>BARRIERE SAINT GILLES  </h1><div id='bodyContent' class='bodyContent'><p class='address'><span class='glyphicon glyphicon-map-marker'></span>  Chausséé d Alsemberg, 36 1060 Bruxelles </p><p class='phone'><span class='glyphicon glyphicon-info-sign'></span>  02 880 24 90 </p> <p class='hour'><span class='fa fa-clock-o'></span> Funcionamento</p></div></div>"
//     }, {
//         lat:  51.225715, 
//         lng:   4.416039,
//         info: "<div id='content'><div id='siteNotice'></div> <h1 id='firstHeading' class='firstHeading'><img src='/dist/imgs/logo-footer.jpg' alt=''>ANTWERPEN  </h1><div id='bodyContent' class='bodyContent'><p class='address'><span class='glyphicon glyphicon-map-marker'></span>  Howerstraat, 2 2060 Antwerpen </p><p class='phone'><span class='glyphicon glyphicon-info-sign'></span>  02 880 24 90 </p> <p class='hour'><span class='fa fa-clock-o'></span> Funcionamento</p></div></div>"
//     }, {
//        lat:  50.837362, 
//         lng: 4.342211,
//         info: "<div id='content'><div id='siteNotice'></div> <h1 id='firstHeading' class='firstHeading'><img src='dist/imgs/logo-footer.jpg' alt=''>MIDI  </h1><div id='bodyContent' class='bodyContent'><p class='address'><span class='glyphicon glyphicon-map-marker'></span>  Boulevard du Midi, 96 1000 Bruxelles </p><p class='phone'><span class='glyphicon glyphicon-info-sign'></span>  02 880 24 90 </p> <p class='hour'><span class='fa fa-clock-o'></span> Funcionamento</p></div></div>"
//     }, {
//         lat: 50.838805, 
//         lng:  4.335605,
//         info: "<div id='content'><div id='siteNotice'></div> <h1 id='firstHeading' class='firstHeading'><img src='dist/imgs/logo-footer.jpg' alt=''>PLACE BARA  </h1><div id='bodyContent' class='bodyContent'><p class='address'><span class='glyphicon glyphicon-map-marker'></span>  Place Bara, 28 1070 Anderlecht </p><p class='phone'><span class='glyphicon glyphicon-info-sign'></span>  02 880 24 90 </p> <p class='hour'><span class='fa fa-clock-o'></span> Funcionamento</p></div></div>"
//     }, 
// ];

// function initializeIntern() {

//     var map = new google.maps.Map(document.getElementById('map_canvas'), {
//         zoom: 8,
//         center: {lat: 51.060685, lng: 4.451439},
//         navigationControl: false,
//         scrollwheel: false,
//         streetViewControl: false,
//         mapTypeControl: false
//     });

//     var infoWin = new google.maps.InfoWindow();

//     // Add some markers to the map.
//     // Note: The code uses the JavaScript Array.prototype.map() method to
//     // create an array of markers based on a given "locations" array.
//     // The map() method here has nothing to do with the Google Maps API.
//     var markers = locations.map(function(location, i) {

//         var image = $themeUrl + '/dist/imgs/icons/geopin.png';
//         var marker = new google.maps.Marker({
//             position: location,
//             icon:image,
//             animation: google.maps.Animation.DROP 
//         });

//         google.maps.event.addListener(marker, 'click', function(evt,content,infowindow) {
//             infoWin.setContent(location.info);
//             infoWin.open(map, marker);
//             $("#content").animate({opacity: 1},5000);
//         })
//         return marker;

//         google.maps.event.addDomListener(window, "resize", function() {
//             var center = map.getCenter();
//             google.maps.event.trigger(map, "resize");
//             map.setCenter(center); 
//         });

//     });

//     // Add a marker clusterer to manage the markers.
//     var markerCluster = new MarkerClusterer(map, markers,
//         {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'}
//     );

//     google.maps.event.addDomListener(window, "resize", function() {
//         var center = map.getCenter();
//         google.maps.event.trigger(map, "resize");
//         map.setCenter(center); 
//     });
// }

// function loadScriptIntern() {
//     var script = document.createElement("script");
//     script.type = "text/javascript";
//     script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyC5jAIkCc9fD5VL7X910xvgVOhXMfe_laM&callback=initializeIntern";
//     document.body.appendChild(script);
// }

// window.onload = loadScriptIntern;