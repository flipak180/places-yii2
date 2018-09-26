$(function() {

    var base_href = '/admin';

    // Общее
    $('input.phone').mask("+7 (999) 999-99-99", {autoclear: false});

	// Транслитерация
    var alias_source = $('.alias-source'),
        alias_target = $('.alias-target');

    if (!alias_target.val()) {
		alias_source.keyup(function() {
			alias_target.val(slugify(alias_source.val()));
	    });
    }

    alias_source.focusout(function() {
    	if (!alias_target.val()) alias_target.val(slugify(alias_source.val()));
    });

    // Изображения
    $('a.delete-image').click(function() {
        var item = $(this);
        $.get(item.attr('href'), function(data) {
            item.closest('li').remove();
        });
        return false;
    });

    $('a.rotate-image').click(function() {
        var item = $(this),
            img = item.closest('li').find('img');
        $.get(item.attr('href'), function(data) {
            img.attr('src', data);
        });
        return false;
    });

    var sortable_photoes = $("#sortable_photoes");
    sortable_photoes.sortable({
        update: function(event, ui) {
            var order = []; 
            sortable_photoes.find('li').each( function(e) {
                order.push($(this).data('id'));
            });
            $.get(sortable_photoes.data('url') + '?order=' + order.join(';'));
        }
    });

    // Рейтинг
    var features_score = $('.features_score'),
        placereview_rating = $('#placereview-rating');
    features_score.change(function() {
        var total = 0;
        features_score.each(function(index, el) {
            total += parseInt($(this).val()) || 0;
        });
        var rating = (total / features_score.length).toFixed(2);
        placereview_rating.rating('update', rating);
    });

    // Часы работы
    if ($('#calendar').length) {
        var controller = new MainController();
        controller.init();

        $('[data-date-range-view]').click(function() {
            controller.getView().getDateRangeView().tab($(this).data('date-range-view'));
            return false;
        });

        $('#range-nav').on('click', '[data-tab]', function() {
            controller.getView().getCalendarView().tab($(this).data('tab'));
            return false;
        });
    }

    // Связь города и районов
    var city_select = $('.city-select');
    if (city_select.length) {
        var district_select = $('.district-select'),
            metro_select = $('.metro-select');

        //Смена города
        city_select.change(function() {
            $.get(base_href + '/districts/find-by-city?city_id=' + $(this).val(), function(data) {
                var districts = '<option value="">Выберите район</option>';
                for (var i = 0; i < data.length; i++) {
                    districts += '<option value="' + data[i]["id"] + '">' + data[i]["name"] + '</option>';
                }
                district_select.html(districts).prop('disabled', districts ? false : true);
            });

            $.get(base_href + '/metro-stations/find-by-city?city_id=' + $(this).val(), function(data) {
                var stations = '';
                for (var i = 0; i < data.length; i++) {
                    stations += '<option value="' + data[i]["id"] + '">' + data[i]["name"] + '</option>';
                }
                metro_select.html(stations).prop('disabled', stations ? false : true);
            });
        });
    }

    // Карта в форме добавления заведения
    var place_map_cont = $('#place-map');
    if (place_map_cont.length) {
        var place_map,
            placemark,
            def_coords,
            def_zoom,
            place_address = $('#place-address'),
            place_coordinates = $('#place-coordinates'),
            place_latitude = $('#place-latitude'),
            place_longitude = $('#place-longitude');

        ymaps.ready(initPlaceAddMap);
        function initPlaceAddMap() {
            if (place_coordinates.val()) {
                def_coords = place_coordinates.val().split(',');
                def_zoom = 15;
            } else {
                def_coords = place_map_cont.data('coords').split(',');
                def_zoom = 12;
            }

            place_map = new ymaps.Map('place-map', {
                center: def_coords, // 59.837906, 30.509141
                zoom: def_zoom // от 0 до 19
            });

            placemark = new ymaps.Placemark(def_coords, {}, {
                preset: 'islands#darkBlueDotIcon',
                iconColor: '#0095b6'
            });
            place_map.geoObjects.add(placemark);

            place_map.events.add('click', function (e) {
                updateCoords(e.get('coords'), false, false);
            });

            $('#place-coordinates').change(function() {
                updateCoords($(this).val().split(',').map(item => parseFloat(item.trim())), true, false);
            });
        }

        function updateCoords(coords, set_center = false, change_addr = false) {
            placemark.geometry.setCoordinates(coords);
            if (set_center) place_map.setCenter(coords, 15);
            place_latitude.val(coords[0].toFixed(6));
            place_longitude.val(coords[1].toFixed(6));
            place_coordinates.val([coords[1].toFixed(6), coords[0].toFixed(6)].join(', '));
            if (!place_address.val() || change_addr) {
                $.getJSON('https://geocode-maps.yandex.ru/1.x/', {geocode: [coords[1], coords[0]].join(','), format: 'json'}, function(json, textStatus) {
                    place_address.val(json.response.GeoObjectCollection.featureMember[0].GeoObject.name).trigger('change');
                });
            }
        }

        $('#place-city_id').change(function() {
            $.get(base_href + '/cities/get-coordinates?id=' + $(this).val(), function(data) {
                $('.geo-block').show();
                updateCoords(data.split(',').map(item => parseFloat(item.trim())), true, true);
            });
        });
    }

    // Sheduler
    if ($('#sheduler').length) {
        var mode, // 1 - check, 2 - uncheck
            shedule_hour = $('.shedule-hour');

        shedule_hour.mouseover(function(e) {
            if (mode && (e.buttons == 1 || e.buttons == 3) && !$(this).hasClass('changed')) {
                if (mode == 1) $(this).addClass('active').addClass('changed').find('input').prop('checked', true);
                if (mode == 2) $(this).removeClass('active').addClass('changed').find('input').prop('checked', false);
            }
        });

        shedule_hour.mousedown(function() {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active').addClass('changed').find('input').prop('checked', false);
                mode = 2;
            } else {
                $(this).addClass('active').addClass('changed').find('input').prop('checked', true);
                mode = 1;
            }
        });

        $('body').mouseup(function() {
            shedule_hour.removeClass('changed');
        });

        $('#shedule-check').click(function() {
            shedule_hour.each(function() {
                $(this).addClass('active').addClass('changed').find('input').prop('checked', true);
            });
        });

        $('#shedule-uncheck').click(function() {
            shedule_hour.each(function() {
                $(this).removeClass('active').addClass('changed').find('input').prop('checked', false);
            });
        });
    }

});