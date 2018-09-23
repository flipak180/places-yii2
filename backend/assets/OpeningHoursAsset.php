<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class OpeningHoursAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/fullcalendar.css',
    ];
    public $js = [
		'js/opening-hours/moment.min.js',
        'js/opening-hours/fullcalendar.js',
        'js/opening-hours/ru.js',
        'js/opening-hours/opening_hours.min.js',
        'js/opening-hours/utils.js',
        'js/opening-hours/model.js',
        'js/opening-hours/view.js',
        'js/opening-hours/controller.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
