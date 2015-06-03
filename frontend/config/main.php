<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name' => 'Solomashka',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
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
                // Site
                '/' => 'site/index',
                '/subscribe' => 'site/subscribe',
                'sitemap.xml' => 'sitemap/index',
                // Cart
                'cart' => 'cart/index',
                'cart/order' => 'cart/order',
                'cart/add/<id:\d+>' => 'cart/add',
                'cart/remove/<id:\d+>' => 'cart/remove',
                'cart/clear' => 'cart/clear',
                // Page
                'page/<slug>' => 'page/view',
                // Catalog
                'catalog/page/<page:\d+>' => 'catalog/index',
                'catalog' => 'catalog/index',
                '<category:.+>/<slug>' => 'catalog/view',
                '<category:.+>' => 'catalog/category',
            ],
        ],
        'view' => [
            'class' => '\rmrevin\yii\minify\View',
            'enableMinify' => !YII_DEBUG,
            'web_path' => '@web', // path alias to web base
            'base_path' => '@webroot', // path alias to web base
            'minify_path' => '@webroot/assets', // path alias to save minify result
            'js_position' => [ \yii\web\View::POS_END ], // positions of js files to be minified
            'force_charset' => 'UTF-8', // charset forcibly assign, otherwise will use all of the files found charset
            'expand_imports' => true, // whether to change @import on content
            'compress_output' => true, // compress result html page
        ],
    ],
    'params' => $params,
];
