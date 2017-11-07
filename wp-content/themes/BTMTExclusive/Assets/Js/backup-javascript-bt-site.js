		function abrirInfoBox(id, marker) {
			if (typeof(idInfoBoxAberto) == 'number' && typeof(infoBox[idInfoBoxAberto]) == 'object') {
				infoBox[idInfoBoxAberto].close();
			}
			infoBox[id].open(map, marker);
			idInfoBoxAberto = id;
		}
		// function initMap() {
		// 	var directionsDisplay = new google.maps.DirectionsRenderer;
		// 	// branch
		// 	var bara = new google.maps.LatLng(50.838703,4.3359193);
		// 	var pavis = new google.maps.LatLng(50.83457,4.354532);
		// 	var barriere = new google.maps.LatLng(50.825723,4.344069);
		// 	var flagey = new google.maps.LatLng(50.829619,4.373);
		// 	var antwerpen = new google.maps.LatLng(51.225326, 4.415412);
		// 	var midi = new google.maps.LatLng(50.837305, 4.342244);
		// 	var anspach = new google.maps.LatLng(50.847304, 4.348792);
		// 	var ixelles = new google.maps.LatLng(50.829628, 4.372951);
		// 	var latlngbounds = new google.maps.LatLngBounds();
		// 	map = new google.maps.Map(document.getElementById('mapaUni'), {
		// 		zoom: 10,
		// 		center: pavis,
		// 		scrollwheel: true
		// 	});
		// 	directionsDisplay.setMap(map);
		// 	var iconBase = '<?php echo get_template_directory_uri(); ?>/Assets/Images/';
		// 	// ----------------------------------
		// 	var contentString = 
		// 	'<div class="topomapa1"><img class="imgmapa img-circle" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/pavis.png">'+
		// 	'<h4>Bara</h4>'+
		// 	'<p><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/mapa.png">Place Bara 28, 1070</p></div>'+
		// 	'<h5><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/time1.png"> Opening Hours</h5>'+
		// 	'<p class="textomapa">Monday - Friday: 8 AM - 8 PM + 1 GMT</p>'+
		// 	'<p class="textomapa">Saturday: 9 AM - 6 PM + 1 GMT</p>'+
		// 	'<p class="textomapa">Sunday: 9 AM - 4 PM + 1 GMT</p>';
		// 	var infowindow = new google.maps.InfoWindow({
		// 		content: contentString
		// 	});
		// 	google.maps.event.addListener(infowindow, 'domready', function() {
		// 		// Reference to the DIV which receives the contents of the infowindow using jQuery
		// 		var iwOuter = $('.gm-style-iw');
		// 	   /* The DIV we want to change is above the .gm-style-iw DIV.

		// 	    * So, we use jQuery and create a iwBackground variable,

		// 	    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().

		// 	    */
		// 	    var iwBackground = iwOuter.prev();
		// 	   // Remove the background shadow DIV
		// 	   iwBackground.children(':nth-child(2)').css({'display' : 'none'});
		// 	   // Remove the white background DIV
		// 	   iwBackground.children(':nth-child(4)').css({'display' : 'none'});
		// 	   a = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style');
		// 	   a+='background-color:#C0D600; border-right: 2px solid #00395e; z-index: 1100;';
		// 	   b = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style');
		// 	   b+='background-color:#C0D600;border-left: 2px solid #00395e; z-index: 1100;';
		// 	   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style',a);
		// 	   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style',b);
		// 	});
		// 	marker = new google.maps.Marker({
		// 		position: bara,
		// 		map: map,
		// 		id:1,
		// 			//title: 'Placa Bara, 28 1070 Bruxelles, Call us now on +32484200679',
		// 			icon: iconBase + 'MapPin.png'

		// 		});	
		// 	marker.addListener('click', function() {
		// 		infowindow.open(map, marker);
		// 	});
		// 	marker.setMap(map);
		// 	// ----------------------------------
		// 	// ----------------------------------
		// 	contentString = '<div class="topomapa1"><img class="imgmapa img-circle" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/bara.png">'+
		// 	'<h4>Flagey</h4>'+
		// 	'<p><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/mapa.png">Rue Malibran 33, 1050</p></div>'+
		// 	'<h5><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/time1.png"> Opening Hours</h5>'+
		// 	'<p class="textomapa">Monday - Friday: 9 AM - 7 PM + 1 GMT</p>'+
		// 	'<p class="textomapa">Saturday: 10 AM - 5 PM + 1 GMT</p>'+
		// 	'<p class="textomapa">Sunday: Closed</p>';
		// 	var infowindow1 = new google.maps.InfoWindow({
		// 		content: contentString
		// 	});
		// 	google.maps.event.addListener(infowindow1, 'domready', function() {
		// 	// Reference to the DIV which receives the contents of the infowindow using jQuery
		// 	var iwOuter = $('.gm-style-iw');
		//    /* The DIV we want to change is above the .gm-style-iw DIV.

		//     * So, we use jQuery and create a iwBackground variable,

		//     * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().

		//     */
		//     var iwBackground = iwOuter.prev();
		//    // Remove the background shadow DIV
		//    iwBackground.children(':nth-child(2)').css({'display' : 'none'});
		//    // Remove the white background DIV
		//    iwBackground.children(':nth-child(4)').css({'display' : 'none'});
		//    a = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style');
		//    a+='background-color:#C0D600; border-right: 2px solid #00395e; z-index: 1100;';
		//    b = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style');
		//    b+='background-color:#C0D600;border-left: 2px solid #00395e; z-index: 1100;';
		//    $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style',a);
		//    $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style',b);
		// });







		marker1 = new google.maps.Marker({

			position: flagey,

			map: map,

			id:2,

				//title: 'Placa Bara, 28 1070 Bruxelles, Call us now on +32484200679',

				icon: iconBase + 'MapPin.png'

			});

		

		marker1.addListener('click', function() {

			infowindow1.open(map, marker1);

		});

		marker1.setMap(map);

		// ----------------------------------





		// ----------------------------------

		contentString = '<div class="topomapa1"><img class="imgmapa img-circle" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/flagey.png">'+

		'<h4>Parvis</h4>'+

		'<p><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/mapa.png">Av Jean Volders 58, 1060</p></div>'+

		'<h5><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/time1.png"> Opening Hours</h5>'+

		'<p class="textomapa">Monday - Friday: 9 AM - 8 PM + 1 GMT</p>'+

		'<p class="textomapa">Saturday: 10 AM - 5 PM + 1 GMT</p>'+

		'<p class="textomapa">Sunday: Closed</p>';



		var infowindow2 = new google.maps.InfoWindow({



			content: contentString



		});





		google.maps.event.addListener(infowindow2, 'domready', function() {

			// Reference to the DIV which receives the contents of the infowindow using jQuery

			var iwOuter = $('.gm-style-iw');



		   /* The DIV we want to change is above the .gm-style-iw DIV.

		    * So, we use jQuery and create a iwBackground variable,

		    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().

		    */

		    var iwBackground = iwOuter.prev();



		   // Remove the background shadow DIV

		   iwBackground.children(':nth-child(2)').css({'display' : 'none'});



		   // Remove the white background DIV

		   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

		   a = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style');

		   a+='background-color:#C0D600; border-right: 2px solid #00395e; z-index: 1100;';

		   b = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style');

		   b+='background-color:#C0D600;border-left: 2px solid #00395e; z-index: 1100;';

		   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style',a);

		   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style',b);



		});





		marker2 = new google.maps.Marker({

			position: pavis,

			map: map,

			id:3,

				//title: 'Placa Bara, 28 1070 Bruxelles, Call us now on +32484200679',

				icon: iconBase + 'MapPin.png'

			});



		

		marker2.addListener('click', function() {

			infowindow2.open(map, marker2);

		});

		marker2.setMap(map);



		//---------  



		contentString = '<div class="topomapa1"><img class="imgmapa img-circle" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/midi.png">'+

		'<h4>Barriere</h4>'+

		'<p><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/mapa.png">Chaussée d\'Alsemberg 36, 1036</p></div>'+

		'<h5><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/time1.png"> Opening Hours</h5>'+

		'<p class="textomapa">Monday - Friday: 9 AM - 7 PM + 1 GMT</p>'+

		'<p class="textomapa">Saturday: 10 AM - 5 PM + 1 GMT</p>'+

		'<p class="textomapa">Sunday: Closed</p>';



		var infowindow3 = new google.maps.InfoWindow({

			content: contentString

		});





		google.maps.event.addListener(infowindow3, 'domready', function() {

			// Reference to the DIV which receives the contents of the infowindow using jQuery

			var iwOuter = $('.gm-style-iw');



		   /* The DIV we want to change is above the .gm-style-iw DIV.

		    * So, we use jQuery and create a iwBackground variable,

		    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().

		    */

		    var iwBackground = iwOuter.prev();



		   // Remove the background shadow DIV

		   iwBackground.children(':nth-child(2)').css({'display' : 'none'});



		   // Remove the white background DIV

		   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

		   a = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style');

		   a+='background-color:#C0D600; border-right: 2px solid #00395e; z-index: 1100;';

		   b = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style');

		   b+='background-color:#C0D600;border-left: 2px solid #00395e; z-index: 1100;';

		   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style',a);

		   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style',b);



		});





		marker3 = new google.maps.Marker({

			position: barriere,

			map: map,

			id:3,

				//title: 'Placa Bara, 28 1070 Bruxelles, Call us now on +32484200679',

				icon: iconBase + 'MapPin.png'

			});



		

		marker3.addListener('click', function() {

			infowindow3.open(map, marker3);

		});

		marker3.setMap(map);







		// ----------------------------------

		contentString = '<div class="topomapa1"><img class="imgmapa img-circle" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/barriere.png">'+

		'<h4>Antwerpen</h4>'+

		'<p><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/mapa.png">Houwerstraat 2, 2060 Antwerpen</p></div>'+

		'<h5><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/time1.png"> Opening Hours</h5>'+

		'<p class="textomapa">Monday - Friday: 9 AM - 5 PM + 1 GMT</p>'+

		'<p class="textomapa">Saturday: 10 AM - 5 PM + 1 GMT</p>'+

		'<p class="textomapa">Sunday: Closed</p>';



		var infowindow4 = new google.maps.InfoWindow({

			content: contentString

		});





		google.maps.event.addListener(infowindow4, 'domready', function() {

			// Reference to the DIV which receives the contents of the infowindow using jQuery

			var iwOuter = $('.gm-style-iw');



		   /* The DIV we want to change is above the .gm-style-iw DIV.

		    * So, we use jQuery and create a iwBackground variable,

		    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().

		    */

		    var iwBackground = iwOuter.prev();



		   // Remove the background shadow DIV

		   iwBackground.children(':nth-child(2)').css({'display' : 'none'});



		   // Remove the white background DIV

		   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

		   a = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style');

		   a+='background-color:#C0D600; border-right: 2px solid #00395e; z-index: 1100;';

		   b = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style');

		   b+='background-color:#C0D600;border-left: 2px solid #00395e; z-index: 1100;';

		   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style',a);

		   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style',b);



		});





		marker4 = new google.maps.Marker({

			position: antwerpen,

			map: map,

			id:4,

				//title: 'Placa Bara, 28 1070 Bruxelles, Call us now on +32484200679',

				icon: iconBase + 'MapPin.png'

			});

		

		marker4.addListener('click', function() {

			infowindow4.open(map, marker4);

		});

		marker4.setMap(map);

		// ----------------------------------





		// ----------------------------------

		contentString = '<div class="topomapa1"><img class="imgmapa img-circle" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/antwerpen.png">'+

		'<h4>Midi</h4>'+

		'<p><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/mapa.png">Boulevard du Midi 96, 1000</p></div>'+

		'<h5><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/time1.png"> Opening Hours</h5>'+

		'<p class="textomapa">Monday - Friday: 10 AM - 7 PM + 1 GMT</p>'+

		'<p class="textomapa">Saturday: 10 AM - 5 PM + 1 GMT</p>'+

		'<p class="textomapa">Sunday: 9 AM - 3 PM + 1 GMT</p>';



		var infowindow5 = new google.maps.InfoWindow({

			content: contentString

		});



		google.maps.event.addListener(infowindow5, 'domready', function() {

			// Reference to the DIV which receives the contents of the infowindow using jQuery

			var iwOuter = $('.gm-style-iw');



		   /* The DIV we want to change is above the .gm-style-iw DIV.

		    * So, we use jQuery and create a iwBackground variable,

		    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().

		    */

		    var iwBackground = iwOuter.prev();



		   // Remove the background shadow DIV

		   iwBackground.children(':nth-child(2)').css({'display' : 'none'});



		   // Remove the white background DIV

		   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

		   a = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style');

		   a+='background-color:#C0D600; border-right: 2px solid #00395e; z-index: 1100;';

		   b = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style');

		   b+='background-color:#C0D600;border-left: 2px solid #00395e; z-index: 1100;';

		   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style',a);

		   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style',b);



		});





		marker5 = new google.maps.Marker({

			position: midi,

			map: map,

			id:5,

				//title: 'Placa Bara, 28 1070 Bruxelles, Call us now on +32484200679',

				icon: iconBase + 'MapPin.png'

			});

		

		marker5.addListener('click', function() {

			infowindow5.open(map, marker5);

		});

		marker5.setMap(map);

		// ----------------------------------





		// ----------------------------------

		contentString = '<div class="topomapa1"><img class="imgmapa img-circle" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/midi.png">'+

		'<h4>Anspach</h4>'+

		'<p><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/mapa.png">Boulevard Anspach 118, 1000</p></div>'+

		'<h5><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/time1.png"> Opening Hours</h5>'+

		'<p class="textomapa">Monday - Friday: 9 AM - 7 PM + 1 GMT</p>'+

		'<p class="textomapa">Saturday: 10 AM - 5 PM + 1 GMT</p>'+

		'<p class="textomapa">Sunday: Closed</p>';



		var infowindow6 = new google.maps.InfoWindow({

			content: contentString

		});





		google.maps.event.addListener(infowindow6, 'domready', function() {

			// Reference to the DIV which receives the contents of the infowindow using jQuery

			var iwOuter = $('.gm-style-iw');



		   /* The DIV we want to change is above the .gm-style-iw DIV.

		    * So, we use jQuery and create a iwBackground variable,

		    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().

		    */

		    var iwBackground = iwOuter.prev();



		   // Remove the background shadow DIV

		   iwBackground.children(':nth-child(2)').css({'display' : 'none'});



		   // Remove the white background DIV

		   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

		   a = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style');

		   a+='background-color:#C0D600; border-right: 2px solid #00395e; z-index: 1100;';

		   b = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style');

		   b+='background-color:#C0D600;border-left: 2px solid #00395e; z-index: 1100;';

		   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style',a);

		   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style',b);



		});





		marker6 = new google.maps.Marker({

			position: anspach,

			map: map,

			id:6,

				//title: 'Placa Bara, 28 1070 Bruxelles, Call us now on +32484200679',

				icon: iconBase + 'MapPin.png'

			});

		

		marker6.addListener('click', function() {

			infowindow6.open(map, marker6);

		});

		marker6.setMap(map);

		// ----------------------------------







		// ----------------------------------

		contentString = '<div class="topomapa1"><img class="imgmapa img-circle" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/anspach.png">'+

		'<h4>Ixelles</h4>'+

		'<p><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/mapa.png">Rua Malibran 25, 1050</p></div>'+

		'<h5><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/lojas/time1.png"> Opening Hours</h5>'+

		'<p class="textomapa">Monday - Friday: 9 AM - 7 PM + 1 GMT</p>'+

		'<p class="textomapa">Saturday: 10 AM - 5 PM + 1 GMT</p>'+

		'<p class="textomapa">Sunday: Closed</p>';



		var infowindow7 = new google.maps.InfoWindow({

			content: contentString

		});





		google.maps.event.addListener(infowindow7, 'domready', function() {

			// Reference to the DIV which receives the contents of the infowindow using jQuery

			var iwOuter = $('.gm-style-iw');



		   /* The DIV we want to change is above the .gm-style-iw DIV.

		    * So, we use jQuery and create a iwBackground variable,

		    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().

		    */

		    var iwBackground = iwOuter.prev();



		   // Remove the background shadow DIV

		   iwBackground.children(':nth-child(2)').css({'display' : 'none'});



		   // Remove the white background DIV

		   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

		   a = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style');

		   a+='background-color:#C0D600; border-right: 2px solid #00395e; z-index: 1100;';

		   b = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style');

		   b+='background-color:#C0D600;border-left: 2px solid #00395e; z-index: 1100;';

		   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style',a);

		   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style',b);



		});





		marker7 = new google.maps.Marker({

			position: ixelles,

			map: map,

			id:7,

				//title: 'Placa Bara, 28 1070 Bruxelles, Call us now on +32484200679',

				icon: iconBase + 'MapPin.png'

			});

		

		marker7.addListener('click', function() {

			infowindow7.open(map, marker7);

		});

		marker7.setMap(map);

		// ---------------------------------

		}

		// #Google Maps End