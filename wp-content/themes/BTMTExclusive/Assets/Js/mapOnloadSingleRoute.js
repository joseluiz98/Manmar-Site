var directionDisplay;
var directionsService = new google.maps.DirectionsService();
var mapRoute;
function initialize() {
	directionsDisplay = new google.maps.DirectionsRenderer();
	var myLatlng = new google.maps.LatLng();
	
	var myOptions = {
		zoom:7,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		center: myLatlng
	}

	mapRoute = new google.maps.Map(document.getElementById("map_canvas_route"), myOptions);
	directionsDisplay.setMap(mapRoute);
	directionsDisplay.setPanel(document.getElementById("directionsPanel"));
}
function calcRoute() {
	var start = document.getElementById("endereco").value;
	var end = document.getElementById("destino").value;
	var request = {
		origin:start, 
		destination:end,
		travelMode: google.maps.DirectionsTravelMode.DRIVING
	};
	
	directionsService.route(request, function(response, status) {
		if (status == google.maps.DirectionsStatus.OK) {
			directionsDisplay.setDirections(response);
		} else {
			alert(status);
		}

		document.getElementById('mapview').style.visibility = 'visible';
	});
}

// function loadScriptIntern() {
//     var script = document.createElement("script");
//     script.type = "text/javascript";
//     script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyC5jAIkCc9fD5VL7X910xvgVOhXMfe_laM&callback=initialize";
//     document.body.appendChild(script);
// }

// window.onload = loadScriptIntern;