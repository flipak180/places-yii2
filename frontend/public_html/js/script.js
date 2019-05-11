$(function() {
	
	if ($('#index-map').length) {
		//ymaps.ready(initIndexMap);
        function initIndexMap() {
            var place_map,
                placemark;

            place_map = new ymaps.Map('index-map', {
                center: [59.939095, 30.315868], // 59.837906, 30.509141
                zoom: 11 // от 0 до 19
            });

            $.getJSON('/places/map', function(places) {
                places.forEach(function(place) {
                    placemark = new ymaps.Placemark([place.latitude, place.longitude], {
                        balloonContent: place.name
                    }, {
                        preset: 'islands#darkBlueDotIcon',
                        iconColor: '#0095b6'
                    });
                    place_map.geoObjects.add(placemark);
                });
            });
        }
	}

});