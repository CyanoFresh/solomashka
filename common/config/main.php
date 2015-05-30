<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru',
    'components' => [
        'db' => [
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 3600,
            'schemaCache' => 'cache',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en',
                    'basePath' => '@common/messages',
                ],
            ],
        ],
        'cart' => [
            'class' => 'yz\shoppingcart\ShoppingCart',
            'cartId' => 'yii2shop',
        ],
        'view' => [
            'class' => '\rmrevin\yii\minify\View',
            'enableMinify' => false,
            'web_path' => '@web', // path alias to web base
            'base_path' => '@webroot', // path alias to web base
            'minify_path' => '@webroot/minify', // path alias to save minify result
            'js_position' => [ \yii\web\View::POS_END ], // positions of js files to be minified
            'force_charset' => 'UTF-8', // charset forcibly assign, otherwise will use all of the files found charset
            'expand_imports' => true, // whether to change @import on content
            'compress_output' => true, // compress result html page
        ],
        'formatter' => [
            'currencyCode' => 'UAH',
        ],
    ],
];
