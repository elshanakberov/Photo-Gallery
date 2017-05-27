<?php




spl_autoload_register(function($class){

  $path = strtolower($class.'_classes.php');
  require_once ($path);

});



 function redirect($location) {
     return header("Location:{$location}");
 }



 ?>
