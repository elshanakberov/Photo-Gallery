<?php

    class User extends Object{

      public $id,$user_name,$user_firstname,$user_lastname,$user_password,$user_image;
      public $upload_directory = 'images',$image_placeholder = 'http://placehold.it/62x62&text=image';
      protected static $db_table = "users";
      protected static $db_table_field = ['user_name','user_firstname','user_lastname','user_password','user_image'];

      public function userImage(){
          return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
      }

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
