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

       public function setFile($file){

           if (empty($file) || !$file || !is_array($file)) {

               $this->errors[] = "No file was uploaded";
               return false;

           }elseif($file['error'] != 0){

               $this->errors[] = $this->upload_errors_array[$file['error']];
               return false;

           }else{

               $this->user_image = basename($file['name']);
               $this->tmp_path       = $file['tmp_name'];
               $this->photo_type     = $file['type'];
               $this->photo_size     = $file['size'];

         }

       }

       public function saveUserImage(){


               if (!empty($this->errors)) {

                   return false;

               }

               if (empty($this->user_image || empty($this->tmp_path))) {

                   $this->errors[] = "The File was not avaiable";
                   return false;

               }

               $target_path = SITE_ROOT . DS .'admin'. DS.'images'. DS.$this->user_image;


               if (file_exists($target_path)) {
                   $this->errors[] = "The File already exists ";
                   return false;
               }

               if (move_uploaded_file($this->tmp_path,$target_path)) {

                       unset($this->tmp_path);
                       return true;

               }else{

                     $this->errors[] = "The Folder was probably does not have permission";
                     return false;

               }


        }

        public function ajaxSave($user_image,$user_id){
              global $database;

              $user_image = $database->escape($user_image);
              $user_id = $database->escape($user_id);

              $this->user_image = $user_image;
              $this->id = $user_id;

              $sql = "UPDATE ".self::$db_table." SET user_image = '{$this->user_image}' ";
              $sql .= "WHERE id = {$this->id}";
              $updateImage = $database->query($sql);

              echo $this->userImage();

        }

    }

    $user = new User();




 ?>
