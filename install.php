<?php

$config=array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'protected',
	'sourceLanguage'=>'ru',
	'modules'=>array(
		'install',
	),
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	'components'=>array(
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>true,
			'rules'=>array(
				'/'=>'install/default',
		)),
		'cache'=>array(
			'class'=>'CDummyCache',
		),
		'languageManager'=>array(
			'class'=>'SLanguageManager'
		),
	),
	'params'=>array(),
);

error_reporting(E_ALL);
define('VERSION', '1.5');

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
//defined('YII_DEBUG') or define('YII_DEBUG', true);
//defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

require_once $yii;
Yii::createWebApplication($config)->run();
