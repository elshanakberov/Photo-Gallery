<?php

include ("classes/functions.php");
include ("classes/new_config.php");
include ("classes/database_classes.php");
include ("classes/session_classes.php");
include ("classes/user_classes.php");
//include ("classes/object_classes.php");

defined('DS') ? null : define('DS',DIRECTORY_SEPARATOR);
define('SITE_ROOT','C:' . DS .'xampp'.DS.'htdocs'.DS.'gallery');
defined('INCLUDE_PATH') ? null : define('INCLUDE_PATH' , SITE_ROOT.DS. 'admin'.DS.'include');


 ?>
