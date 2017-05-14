<?php

    class User{

      public $user_id,$user_name,$user_firstname,$user_lastname,$user_password;

      public static function findAllusers(){
          return self::query("SELECT * FROM users");
      }
      public static function findByid($id){
            $resultArray = self::query("SELECT * FROM users WHERE user_id = {$id} LIMIT 1");
            return !empty($resultArray) ? array_shift($resultArray) : false;
      }
      public static function query($sql){
          global $database;
          $result = $database->query($sql);
          $theObjectarray = array();
          while ($row = mysqli_fetch_array($result)) {
              $theObjectarray[] = self::instantiate($row);
          }
          return $theObjectarray;
      }
      private static function instantiate($row){
          $theObject  = new self;
          //$theObject->user_id = $row['user_id'];
          foreach ($row as $property => $value) {
              if ($theObject->hasProperty($property)) {
                    $theObject->$property = $value;
              }
          }
          return $theObject;
      }
      public function verifyUser($username ,$password ){
          global $database;

          $username = $database->escape($username);
          $password = $database->escape($password);

          $sql = "SELECT * FROM users WHERE user_name = '{$username}' AND user_password ='{$password}' ";
          $findUserArray = self::query($sql);


           return !empty($findUserArray) ? array_shift($findUserArray) : false;

      }
      public function hasProperty($theProperty) {
           $objectProperties = get_object_vars($this);
           return array_key_exists($theProperty,$objectProperties);
      }
      public  function create(){
          global $database;
          $sql = "INSERT INTO users(user_name,user_password,user_firstname,user_lastname) ";
          $sql .= "VALUES( '";
          $sql .= $database->escape($this->user_name) . "', '";
          $sql .= $database->escape($this->user_password) . "', '";
          $sql .= $database->escape($this->user_firstname) . "', '";
          $sql .= $database->escape($this->user_lastname) . "' ) ";
          if ($database->query($sql)) {
              $this->user_id = $database->the_insert_id();
              return true;
          }else{
            return false;
          }
      }
      public function update(){

        global $database;
        $sql = "UPDATE users SET ";
        $sql .= "user_name = '" .$database->escape($this->user_name)."' , ";
        $sql .= "user_password = '".$database->escape($this->user_password)."' , ";
        $sql .= "user_firstname = '".$database->escape($this->user_firstname)."' , ";
        $sql .= "user_lastname = '".$database->escape($this->user_lastname)."' ";
        $sql .= " WHERE user_id = ".$database->escape($this->user_id);
        $database->query($sql);


        return (mysqli_affected_rows($database->_con) == 1 ) ? true : false;
      }
      public function delete(){
          global $database;
          $sql = "DELETE FROM users WHERE user_id = ".$database->escape($this->user_id)." LIMIT 1";
          $database->query($sql);
      }

    }

    $user = new User();




 ?>
