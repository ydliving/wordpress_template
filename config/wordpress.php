<?php

define('APP_ROOT', dirname(__DIR__) );

define('APP_ENV', getenv('APPLICATION_ENV'));

// define('ABSPATH', APP_ROOT . '/public/site/');

define('WP_HOME', 'http://yd.local');
define('WP_SITEURL', WP_HOME . '/site/');
define('WP_CONTENT_DIR', APP_ROOT . '/public/content');
define('WP_CONTENT_URL', WP_HOME . '/content');

define('WP_DEBUG', true);

if (file_exists(APP_ROOT . '/config/env/local.php')) {
	require APP_ROOT . '/config/env/local.php';
} else if(APP_ENV) {
	require APP_ROOT . '/config/env/' . APP_ENV . '.php';
} else {
	require APP_ROOT . '/config/env/development.php';
}

/** require composer autoload file **/

require APP_ROOT . '/vendor/autoload.php';

$table_prefix  = 'wp_';

define('WPLANG', 'zh_CN');

if ( !defined('ABSPATH') )
	define('ABSPATH', APP_ROOT . '/public/site/');

if (!class_exists('WP_CLI\Runner'))
        require_once(ABSPATH . 'wp-settings.php');

//ActiveRecord\Config::initialize(function($cfg)
//  {
//    $cfg->set_model_directory(APP_ROOT . '/app/models');
//    $cfg->set_connections(array('development' =>
//      'mysql://username:password@localhost/database_name'));
// });

 $connections = array(
      'development' => 'mysql://root@127.0.0.1/ydliving',
    'production' =>'mysql://root@127.0.0.1/ydliving',
    'test' => 'mysql://username:password@localhost/test'
  );

  # must issue a "use" statement in your closure if passing variables
  ActiveRecord\Config::initialize(function($cfg) use ($connections)
  {
   $cfg->set_model_directory(APP_ROOT . '/app/models');
   $cfg->set_connections($connections);

   # default connection is now production
   $cfg->set_default_connection('production');
 });