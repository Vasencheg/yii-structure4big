<?php
/**
 * params.php
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/22/12
 * Time: 1:39 PM
 */
/**
 * Parameters shared by all applications.
 * Please put environment-sensitive parameters in env/params-{environmentcode}.php
 */
$commonConfigDir = dirname(__FILE__);

// get local parameters in
$commonParamsLocalFile = $commonConfigDir . DIRECTORY_SEPARATOR . 'params-local.php';
$commonParamsLocal = file_exists($commonParamsLocalFile) ? require ($commonParamsLocalFile) : array();

// if exists, include it, otherwise set as an empty array
$commonEnvParamsFile = $commonConfigDir . DIRECTORY_SEPARATOR . 'params-env.php';
$commonEnvParams = file_exists($commonEnvParamsFile) ? require($commonEnvParamsFile) : array();

return CMap::mergeArray(array(
    // cache settings -if APC is not loaded, then use CDbCache
    'cache.core' => extension_loaded('apc') ?
        array(
            'class' => 'CApcCache',
        ) :
        array(
            'class' => 'CDbCache',
            'connectionID' => 'db',
            'autoCreateCacheTable' => true,
            'cacheTableName' => 'cache',
        ),
    'cache.content' => array(
        'class' => 'CDbCache',
        'connectionID' => 'db',
        'autoCreateCacheTable' => true,
        'cacheTableName' => 'cache',
    ),

    // yii-user module config
    'components.user' => array(
        // enable cookie-based authentication
        'class' => 'RWebUser',
        'allowAutoLogin' => true,
        'loginUrl' => array('/user/login'),
    ),
    'modules.user' => array(
        // Указываем путь до класса модуля
        'class' => 'common.modules.user.UserModule',
        'tableUsers' => 'users',
        'tableProfiles' => 'profiles',
        'tableProfileFields' => 'profiles_fields',
        // encrypting method (php hash function)
        'hash' => 'md5',
        // send activation email
        'sendActivationMail' => true,
        // allow access for non-activated users
        'loginNotActiv' => false,
        // activate user on registration (only sendActivationMail = false)
        'activeAfterRegister' => false,
        // automatically login from registration
        'autoLogin' => true,
        // registration path
        'registrationUrl' => array('/user/registration'),
        // recovery password path
        'recoveryUrl' => array('/user/recovery'),
        // login form path
        'loginUrl' => array('/user/login'),
        // page after login
        'returnUrl' => array('/user/profile'),
        // page after logout
        'returnLogoutUrl' => array('/user/login'),
    ),
    // end yii-user module config

    // rights module config
    'components.rights' => array(
        'class' => 'common.modules.rights.components.RDbAuthManager',
        'connectionID' => 'db',
        'defaultRoles' => array('Authenticated', 'Guest'),
    ),
    'modules.rights' => array(
        'class' => 'common.modules.rights.RightsModule',
        'superuserName' => 'Admin', // Name of the role with super user privileges.
        'authenticatedName' => 'Authenticated', // Name of the authenticated user role.
        'userIdColumn' => 'id', // Name of the user id column in the database.
        'userNameColumn' => 'username', // Name of the user name column in the database.
        'enableBizRule' => true, // Whether to enable authorization item business rules.
        'enableBizRuleData' => true, // Whether to enable data for business rules.
        'displayDescription' => true, // Whether to use item description instead of name.
        'flashSuccessKey' => 'RightsSuccess', // Key to use for setting success flash messages.
        'flashErrorKey' => 'RightsError', // Key to use for setting error flash messages.
        'baseUrl' => '/rights', // Base URL for Rights. Change if module is nested.
        'layout' => 'rights.views.layouts.main', // Layout to use for displaying Rights.
        'appLayout' => 'application.views.layouts.main', // Application layout.
        'cssFile' => 'rights.css', // Style sheet file to use for Rights.
        'install' => false, // Whether to enable installer.
        'debug' => false,
    ),
    // end rights module config

    // url rules needed by CUrlManager
    'url.rules' => array(
        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    ),
    'php.exePath' => '/usr/bin/php'
), CMap::mergeArray($commonEnvParams, $commonParamsLocal));