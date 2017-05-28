<?php

//include ("classes/object_classes.php");



defined('DS') ? null : define('DS',DIRECTORY_SEPARATOR);
define('SITE_ROOT','C:' . DS .'xampp'.DS.'htdocs'.DS.'gallery');
defined('CORE_PATH') ? null : define('CORE_PATH' , SITE_ROOT.DS. 'admin'.DS.'core');
defined('CLASSES_PATH') ? null : define('CLASSES_PATH' , SITE_ROOT.DS. 'admin'.DS.'classes');

include (CORE_PATH.DS."functions.php");
include (CLASSES_PATH.DS."new_config.php");
include (CLASSES_PATH.DS."database_classes.php");
include (CLASSES_PATH.DS."session_classes.php");
include (CLASSES_PATH.DS."user_classes.php");
include (CLASSES_PATH.DS."photo_classes.php");
include (CLASSES_PATH.DS."comment_classes.php");

 ?>
