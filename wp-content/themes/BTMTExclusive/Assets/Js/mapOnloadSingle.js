function initializeIntern() {

    var objLat = $("#map_canvas").attr('data-lat');
    var objLng = $("#map_canvas").attr('data-long');
    var title = $("#map_canvas").attr('data-title');

    // Criando um array com os estilos
    var styles = [
        {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
        {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
        {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
        {
          featureType: 'administrative.locality',
          elementType: 'labels.text.fill',
          stylers: [{color: '#d59563'}]
        },
        {
          featureType: 'poi',
          elementType: 'labels.text.fill',
          stylers: [{color: '#d59563'}]
        },
        {
          featureType: 'poi.park',
          elementType: 'geometry',
          stylers: [{color: '#263c3f'}]
        },
        {
          featureType: 'poi.park',
          elementType: 'labels.text.fill',
          stylers: [{color: '#6b9a76'}]
        },
        {
          featureType: 'road',
          elementType: 'geometry',
          stylers: [{color: '#38414e'}]
        },
        {
          featureType: 'road',
          elementType: 'geometry.stroke',
          stylers: [{color: '#212a37'}]
        },
        {
          featureType: 'road',
          elementType: 'labels.text.fill',
          stylers: [{color: '#9ca5b3'}]
        },
        {
          featureType: 'road.highway',
          elementType: 'geometry',
          stylers: [{color: '#746855'}]
        },
        {
          featureType: 'road.highway',
          elementType: 'geometry.stroke',
          stylers: [{color: '#1f2835'}]
        },
        {
          featureType: 'road.highway',
          elementType: 'labels.text.fill',
          stylers: [{color: '#f3d19c'}]
        },
        {
          featureType: 'transit',
          elementType: 'geometry',
          stylers: [{color: '#2f3948'}]
        },
        {
          featureType: 'transit.station',
          elementType: 'labels.text.fill',
          stylers: [{color: '#d59563'}]
        },
        {
          featureType: 'water',
          elementType: 'geometry',
          stylers: [{color: '#17263c'}]
        },
        {
          featureType: 'water',
          elementType: 'labels.text.fill',
          stylers: [{color: '#515c6d'}]
        },
        {
          featureType: 'water',
          elementType: 'labels.text.stroke',
          stylers: [{color: '#17263c'}]
        }
  	];

    // Instancio um novo objeto google.maps.StyledMapType passando a matriz que foi criada e um nome para o novo tipo de mapa
    var styledMap = new google.maps.StyledMapType(styles, {
      name: "Mapa Style"
    });

    // Exibir mapa;
    var myLatlng = new google.maps.LatLng(parseFloat(objLat), parseFloat(objLng));
    var mapOptions = {
        zoom: 16,
        center: myLatlng,
        navigationControl: false,
        scrollwheel: false,
        streetViewControl: false,
        panControl : false,
        zoomControl : false,
        mapTypeControl: false,
        // mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
        }
    };

    // Parâmetros do texto que será exibido no clique;
    var contentString = title;
    var infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 700
    });

    //Exibir o mapa na div #mapa;
    var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

    //Exibi o centro do mapa sempre ao centro da tela de exibição
    google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center); 
    });

    //Marcador personalizado;
    //var image = 'http://localhost/bothanique/wp-content/themes/bothanique/dist/imgs/geopin.png';
    var marcadorPersonalizado = new google.maps.Marker({
        position: myLatlng,
        map: map,
        //icon: image,
        title: title,
        animation: google.maps.Animation.DROP
    });      

    //Exibir texto ao clicar no ícone;
    google.maps.event.addListener(marcadorPersonalizado, 'click', function() {
        infowindow.open(map,marcadorPersonalizado);
    });
}
		// function loadScriptIntern() {
		//     var script = document.createElement("script");
		//     script.type = "text/javascript";
		//     script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyDeHb17So0QupSGO_d6b8X-OyvJ32UQehs&callback=initializeIntern";
		//     document.body.appendChild(script);
		// }
		// window.onload = loadScriptIntern;