<?php



function __autoload($class){
 $class = strtolower($class);
 $path = "classes/{$class}_classes.php";
     if(file_exists($path)){
       require_once($path);
     }else{
       die("This file name {$class}_classes.php was not found");
     }
 }

 function redirect($location) {
     return header("Location:{$location}");
 }



 ?>
