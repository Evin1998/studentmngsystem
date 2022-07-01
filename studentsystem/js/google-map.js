function myMap() {
	var location = {lat: 5.341621450801918, lng: 100.2818512916565};
	var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 15, center: location});
	var marker = new google.maps.Marker({position: location, map: map});
}


