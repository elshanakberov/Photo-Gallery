<?php

    class User{

      public $user_id,$user_name,$user_firstname,$user_lastname,$user_password;
      protected static $db_table = "users";
      protected static $db_table_field = ['user_name','user_firstname','user_lastname','user_password'];

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

      public function save(){
          return isset($this->user_id) ? $this->update() : $this->create();
      }

      public function properties(){
          $properties = array();
          foreach (self::$db_table_field as $db_field) {
                if (property_exists($this,$db_field)) {
                      $properties[$db_field] = $this->$db_field;
                }
          }
          return $properties;
      }

      public function propertiesValues(){
          $properties_pairs = [];
          foreach ($this->properties() as $key => $value) {
              $properties_pairs[] = "{$key} = '{$value}'";
          }
          return $properties_pairs;
      }

      public function cleanProperties(){
          global $database;
          $cleanProperties = [];
          foreach ($this->properties() as $key => $value) {
              $cleanProperties[$key] = $database->escape($value);
          }
          return $cleanProperties;
      }

      public  function create(){
          global $database;
          $properties = $this->cleanProperties();
          $sql = "INSERT INTO ".self::$db_table."(" .implode(',' , array_keys($properties)).")";
          $sql .= "VALUES( '".implode("','" , array_values($properties))."')";

          if ($database->query($sql)) {
              $this->user_id = $database->the_insert_id();
              return true;
          }else{
            return false;
          }
      }

      public function update(){

        global $database;
        $properties_pairs = $this->cleanProperties();
        $sql = "UPDATE ".self::$db_table." SET ";
        $sql .= implode(", ",$properties_pairs);
      //  $sql .= "user_name = '" .$database->escape($this->user_name)."' , ";
        $sql .= " WHERE user_id = ".$database->escape($this->user_id);
        $database->query($sql);


        return (mysqli_affected_rows($database->_con) == 1 ) ? true : false;
      }

      public function delete(){
          global $database;
          $sql = "DELETE FROM ".self::$db_table." WHERE user_id = ".$database->escape($this->user_id)." LIMIT 1";
          $database->query($sql);
      }

    }

    $user = new User();




 ?>
