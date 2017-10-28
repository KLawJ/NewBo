<?php
return [
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=icobo.indiancases.com;dbname=rgeorge_ico',
            'username' => 'root',
            'password' => 'icoico',
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 556600,
            'schemaCache' => 'cache',
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
        ],
        'mailer' => [
                'class' => 'yii\swiftmailer\Mailer',
                'viewPath' => '@common/mail',
                'useFileTransport' => false,
            ],
	'allowedIPs' => [
		'127.0.0.1',
		'::1',
		'192.168.1.*',
		'*.*.*.*'
	]
    ],
];
