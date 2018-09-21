$(function() {

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
	
});