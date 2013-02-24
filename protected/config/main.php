<?php
$theme = 'default';

$config = array(
	'basePath'       => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'language'       => 'pt',
	'sourceLanguage' => 'pt',
	'timeZone'       => 'America/Sao_Paulo',
	
	'preload' => array('log', 'session'),

	'import' => array(
		'application.models.*',
		'application.models.forms.*',
		'application.models.utils.*',
		'application.components.*',
	),

	'modules' => array(
		'gii' => array(
			'class'    => 'system.gii.GiiModule',
			'password' => 'qqaazz',
		),
		'admin' => array(
			'components' => array(
				'user' => array(
					'class'          => 'AdminWebUser',
					'allowAutoLogin' => true,
					'stateKeyPrefix' => 'admin_',
				),
			),
        ),
	),

	'components' => array(
		'user' => array(
			'class'          => 'WebUser',
			'allowAutoLogin' => true,
			'stateKeyPrefix' => 'default_',
		),
		'urlManager' => array(
			'urlFormat'      => 'path',
			'showScriptName' => false,
			'rules' => array(
				'content/<tag:[a-z0-9-]+>' => 'content/index',
			),
		),
		'errorHandler' => array(
			'errorAction' => 'error/index',
        ),		
		'log' => array(
			'class' => 'CLogRouter',
			'routes'=>array(
				array(
					'class'     =>'CFileLogRoute',
					'levels'    =>'trace, info, error, warning',
				),
				array(
					'class'     => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
					'ipFilters' => array('127.0.0.1', '::1'),
				),
			),
		),		
		'session' => array(
		  'class' => 'CHttpSession',
		),
	    'mailer' => array(
			'class'       => 'application.extensions.mailer.EMailer',
			'pathViews'   => 'application.views.' . $theme. '.email.',
			'pathLayouts' => 'application.views.' . $theme. '.email.layout.'
		),
	),

	'params' => array(
		
	),
);

return CMap::mergeArray(require(dirname(__FILE__) . '/themes/' . $theme . '.php'), $config);