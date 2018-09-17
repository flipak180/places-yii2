<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=places',
            'username' => 'skav',
            'password' => '7002736',
            'charset' => 'utf8',
            // 'schemaCache' => 'cache',
            // 'schemaCacheDuration' => '3600',
            // 'enableSchemaCache' => true,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'booleanFormat' => ['Нет', 'Да'],
            'nullDisplay' => '-',
            'currencyCode' => 'RUB',
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'vkontakte' => [
                    'class' => 'yii\authclient\clients\VKontakte',
                    'clientId' => '6695835',
                    'clientSecret' => 'ZJqVUrLnh0hf9JzNhWCG',
                    'scope' => 'email',
                ],
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'clientId' => '175266083311713',
                    'clientSecret' => '00f5e456579d46817b4a5188ee99e306',
                    'scope' => 'public_profile, email',
                    'attributeNames' => ['cover', 'name', 'first_name', 'last_name', 'link', 'gender', 'picture', 'verified', 'email']
                ],
                'twitter' => [
                    'class' => 'yii\authclient\clients\Twitter',
                    'attributeParams' => [
                        'include_email' => 'true'
                    ],
                    'consumerKey' => '',
                    'consumerSecret' => '',
                ],
                'odnoklassniki' => [
                    'class' => 'kotchuprik\authclient\Odnoklassniki',
                    'applicationKey' => '',
                    'clientId' => '',
                    'clientSecret' => '',
                    'scope' => 'GET_EMAIL',
                ],
                'yandex' => [
                    'class' => 'yii\authclient\clients\Yandex',
                    'clientId' => '97caa0eeb72a434db2d51b6abb7fb783',
                    'clientSecret' => '52d0a7fe1fd4489488f5fc7c1724aec4',
                    //'returnUrl' => 'https://'.$_SERVER['SERVER_NAME'].'/site/auth?authclient=yandex',
                ],
                'google' => [
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => '1085424972921-coh9qivs1qq9vja1uadpj3jinrtt8ch6.apps.googleusercontent.com',
                    'clientSecret' => 'Pki5oc31qMgvZX5PgFzSWsoF',
                    //'returnUrl' => 'https://'.$_SERVER['SERVER_NAME'].'/site/auth?authclient=google',
                ],
            ],
        ],
    ],
];
