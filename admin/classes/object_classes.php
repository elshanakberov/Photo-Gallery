<?php

    class Object{

      public $errors = [] , $upload_errors_array = [
                  UPLOAD_ERR_OK         => "There is no error",
                  UPLOAD_ERR_INI_SIZE   => "The upload file exceeds the upload_max_size directive",
                  UPLOAD_ERR_FORM_SIZE  => "The uploaded file exceeds the max_file_size directive",
                  UPLOAD_ERR_PARTIAL    => "The uploaded file was only partially uploaded",
                  UPLOAD_ERR_NO_FILE    => "No file was uploaded",
                  UPLOAD_ERR_NO_TMP_DIR => "Missing a temporery folder",
                  UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
                  UPLOAD_ERR_EXTENSION  => "A PHP extension stopped to file upload"
      ];

            public static function findAll(){
                return static::query("SELECT * FROM " . static::$db_table. " ");
            }

            public static function findByid($id){
                  $resultArray = static::query("SELECT * FROM ".static::$db_table." WHERE id = {$id} LIMIT 1");
                  return !empty($resultArray) ? array_shift($resultArray) : false;
            }

            public static function query($sql){
                global $database;

                $result = $database->query($sql);
                $theObjectarray = array();

                while ($row = mysqli_fetch_array($result)) {

                    $theObjectarray[] = static::instantiate($row);

                }
                return $theObjectarray;
            }

            private static function instantiate($row){

                $calledClass = get_called_class();
                $theObject  = new $calledClass;
                //$theObject->id = $row['id'];

                foreach ($row as $property => $value) {

                    if ($theObject->hasProperty($property)) {

                          $theObject->$property = $value;

                    }

                }
                return $theObject;
            }

            public function hasProperty($theProperty) {
                 $objectProperties = get_object_vars($this);
                 return array_key_exists($theProperty,$objectProperties);
            }

            public function save(){
                return isset($this->id) ? $this->update() : $this->create();
            }

            public function properties(){
                $properties = array();

                foreach (static::$db_table_field as $db_field) {

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
                $sql = "INSERT INTO ".static::$db_table."(" .implode(',' , array_keys($properties)).")";
                $sql .= "VALUES( '".implode("','" , array_values($properties))."')";

                if ($database->query($sql)) {

                    $this->id = $database->the_insert_id();
                    return true;

                }else{
                  return false;
                }
            }

            public function update(){

              global $database;

              $properties = $this->cleanProperties();
              $properties_pairs = $this->propertiesValues();

              $sql = "UPDATE " .static::$db_table. " SET ";
              $sql .= implode(", ",$properties_pairs);
            //  $sql .= "user_name = '" .$database->escape($this->user_name)."' , ";``
              $sql .= " WHERE id = ".$database->escape($this->id);

              $database->query($sql);


              return (mysqli_affected_rows($database->_con) == 1 ) ? true : false;
            }

            public function delete(){
                global $database;
                $sql = "DELETE FROM ".static::$db_table." WHERE id = ".$database->escape($this->id)." LIMIT 1";
                $database->query($sql);
            }




    }

 ?>
