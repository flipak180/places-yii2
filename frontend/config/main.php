<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'language' => 'ru',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
//    'container' => [
//        'definitions' => [
//            yii\widgets\ActiveForm::classname() => [
//                'fieldClass' => 'frontend\components\CustomFormField',
//                // 'errorCssClass' => 'form__item_error',
//                // 'successCssClass' => 'form__item_success',
//            ],
//        ],
//    ],
    'components' => [
        'cityDetector' => [
            'class' => 'frontend\components\CityDetectorComponent',
        ],
        'markup' => [
            'class' => 'frontend\components\MarkupComponent',
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'app\components\PlaceUrlRule',
                ],
            ],
        ],
    ],
    'params' => $params,
];
