<?php

    class User extends Object{

      public $id,$user_name,$user_firstname,$user_lastname,$user_password;
      protected static $db_table = "users";
      protected static $db_table_field = ['user_name','user_firstname','user_lastname','user_password'];

      public function verifyUser($username ,$password){

          global $database;

          $username = $database->escape($username);
          $password = $database->escape($password);

          $sql = "SELECT * FROM users WHERE user_name = '{$username}' AND user_password ='{$password}' ";
          $findUserArray = self::query($sql);


           return !empty($findUserArray) ? array_shift($findUserArray) : false;

       }

    }

    $user = new User();




 ?>
