<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = ENVIRONMENT;
$active_record = TRUE;

$db['development']['hostname'] = 'localhost';
$db['development']['username'] = 'root';
$db['development']['password'] = 'root';
$db['development']['database'] = 'huertas';
$db['development']['dbdriver'] = 'mysql';
$db['development']['dbprefix'] = '';
$db['development']['pconnect'] = TRUE;
$db['development']['db_debug'] = TRUE;
$db['development']['cache_on'] = FALSE;
$db['development']['cachedir'] = '';
$db['development']['char_set'] = 'utf8';
$db['development']['dbcollat'] = 'utf8_general_ci';
$db['development']['swap_pre'] = '';
$db['development']['autoinit'] = TRUE;
$db['development']['stricton'] = FALSE;

$db['production']['hostname'] = 'mysql.huertas.coffeebreakwebs.com';
$db['production']['username'] = 'huertasdb';
$db['production']['password'] = 'huertasdb';
$db['production']['database'] = 'GN4XCYlUkNrtvX41uY4BQu';
$db['production']['dbdriver'] = 'mysql';
$db['production']['dbprefix'] = '';
$db['production']['pconnect'] = TRUE;
$db['production']['db_debug'] = TRUE;
$db['production']['cache_on'] = FALSE;
$db['production']['cachedir'] = '';
$db['production']['char_set'] = 'utf8';
$db['production']['dbcollat'] = 'utf8_general_ci';
$db['production']['swap_pre'] = '';
$db['production']['autoinit'] = TRUE;
$db['production']['stricton'] = FALSE;

// Create dsn from the info above
$db[$active_group]['dsn'] = $db[$active_group]['dbdriver'] .
                        '://' . $db[$active_group]['username'] .
                        ':' . $db[$active_group]['password'].
                        '@' . $db[$active_group]['hostname'] .
                        '/' . $db[$active_group]['database'];

// Require Doctrine.php
require_once(realpath(dirname(__FILE__) . '/../..') . DIRECTORY_SEPARATOR . 'system/database/doctrine/Doctrine.php');

// Set the autoloader
spl_autoload_register(array('Doctrine', 'autoload'));
spl_autoload_register(array('Doctrine', 'modelsAutoload'));


// Load the Doctrine connection
Doctrine_Manager::connection($db[$active_group]['dsn'], $db[$active_group]['database']);

// Enable DQL Callbacks
Doctrine_Manager::getInstance()->setAttribute(Doctrine_Core::ATTR_USE_DQL_CALLBACKS, true);

// Set the model loading to conservative/lazy loading
Doctrine_Manager::getInstance()->setAttribute(Doctrine_Core::ATTR_MODEL_LOADING, Doctrine_Core::MODEL_LOADING_CONSERVATIVE);

// Load the models for the autoloader
Doctrine_Core::loadModels(realpath(dirname(__FILE__) . '/..') . DIRECTORY_SEPARATOR . 'models');

/* End of file database.php */
/* Location: ./application/config/database.php */