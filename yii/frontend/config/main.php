<?php
use \yii\web\Request;

// $request = new Request();

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [

        // FACEBOOK LOGIN//( sitecontroller, login)
'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
                    'clientId' => '2189932124632305',
                    'clientSecret' => '7f566a1a5e8b89218297e51d6ab8a6ec',
                    // 'attributeNames' => ['name', 'email','picture'=>"https://graph.facebook.com/".'id'."/picture"],


                    
                ],
                'google' => [
                    'class'        => 'yii\authclient\clients\Google',
                    'clientId'     => '69087977784-jcm2al2cjlu95ud0223au4r9bpo1j844.apps.googleusercontent.com',
                    'clientSecret' => 'T4rGx1bkJCYM5lXER79dDe80',
                    // 'attributeNames' => ['name', 'email'],
                    
                    
                ],
            ],
        ],
        

        ///////

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
            
            'rules' => [
                ''=>'site/index',
                
            ],
        ],
        
    ],
    'params' => $params,
];
