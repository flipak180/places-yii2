<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/design/css/libs.min.css',
        '/design/css/style.css',
        'css/site.css',
    ];
    public $js = [
        '//api-maps.yandex.ru/2.1/?lang=ru_RU',
        '/design/js/libs.min.js',
        '/design/js/script.js',
        'js/script.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
