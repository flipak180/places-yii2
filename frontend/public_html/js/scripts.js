$(document).ready(function() {

    let $asideForm = $('.aside-filters');
    $asideForm.find(':input').change(function() {
        $asideForm.submit();
    });

});
