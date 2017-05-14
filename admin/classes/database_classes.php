<?php

    class Database{
        public $_con;

        public function __construct() {
            $this->connection();
        }
        public function connection(){
              $this->_con = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        }
        public  function query($sql){
            return mysqli_query($this->_con,$sql);
        }
        public function confirmQuery($result){
            if (!$result) {
                die("Query Failed!");
            }
        }
        public function escape($string){
            return mysqli_real_escape_string($this->_con,$string);
        }
        public function the_insert_id() {
            return mysqli_insert_id($this->_con);
        }
    }

    $database = new Database();


 ?>
