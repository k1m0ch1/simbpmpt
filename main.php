<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'BPMPT Kab. Karawang',
    // preloading 'log' component
    'preload' => array('log', 'bootstrap'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
    ),
    'defaultController' => 'dashboard',
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'bootstrap.gii', // since 0.9.1
            ),
        ),
        'rights' => array(
            'superuserName' => 'Superuser',
        //'install'=>true,
        ),
        'p01_il',
        'p02_imt',
        'p03_iptdmj',
        'p04_imb',
        'p05_ipkmkk',
        'p06_iupkl',
        'p07_ipptr',
        'p08_ipa',
        'p09_ipto',
        'p10_ipo',
        'p11_ikaa',
        'p12_tdsk',
        'p13_tdstu', 
        'p14_tdjb',       
        'p15_isjp',
        'p16_iuodtw',
        'p17_it',
        'p18_tdi',
        'p19_iui',
        'p20_ipi',
        'p21_siup',
        'p22_simb',
        'p23_iuppabt',
        'p24_ijb',
        'p25_ie',
        'p26_tdp',
        'p27_tdg',
        'p28_ipabt',
        'p29_ipaabt',
        'p30_iutkh',
        'p31_iplpk',
        'p32_iplbk',
        'p33_iotks',
        'p34_ipkcpjtki',
        'p35_iaapctki',
        'p36_ioppjpb',
        'p37_iupphp',
        'p38_iplb3',
        'p39_ipalasa',
        'p40_ipal',
        'p41_ho',
        'p42_ipss',
        'p43_ir',
        'p44_iujk',
        'p45_ipslb3',
        'p46_ioat',
        'p47_ioas',
        'p48_iuap',
        'p49_iuab',
        'p50_iuki',
        'p51_ipki',
        'p52_umum',
        'p53_rkspp',
        'p54_prt',
	 'p55_kp',
    ),
    // application components
    'components' => array(
        'user' => array(
            'class' => 'WebUser',
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        'authManager' => array(
            'class' => 'RDbAuthManager',
        //'class'=>'CDbAuthManager',
        //'connectionID'=>'db',
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                //'<subfolder:\w+>/<controller:\w+>/<id:\d+>'=>'<subfolder>/<controller>/view',
                '<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
                '/contact' => '/site/contact',
                '/login' => '/site/login',
                '/logout' => '/site/logout',
            ),
        ),
        // uncomment the following to use an SQLite database
        /*
          'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ),
         */
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=bpmpt',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'adminbpmpt2012',
            'charset' => 'utf8',
            'tablePrefix' => '',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages

            /* array(
              'class'=>'CWebLogRoute',
              ), */
            ),
        ),
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
            'coreCss' => true,
            'responsiveCss' => true,
        ),
        'fusioncharts' => array(
            'class' => 'ext.fusioncharts.fusionCharts',
        ),
    ),
    'language' => 'id',
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);