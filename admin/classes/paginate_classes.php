<?php


      class Paginate extends Object{

          public $current_page,$total_data,$data_per_page,$class;

          public function __construct($page = 1 , $data_per_page = 4,$class){

                $this->current_page  = (int)$page;
                $this->data_per_page = (int)$data_per_page;
                $this->total_data    = (int)$this->totalPage($class);


          }

          public function nextPage(){
              return $this->current_page + 1;
          }

          public function previousPage(){
              return $this->current_page - 1;
          }

          public function totalPage($class){
              return ceil(count($class::findAll()) / $this->data_per_page);
          }

          public function hasPrevious(){
              return $this->previousPage() >= 1 ? true : false;
          }

          public function hasNext(){
              return $this->nextPage() <= $this->totalPage($this->class) ? true : false;
          }

          public function offset(){
              return ($this->current_page - 1 ) * $this->data_per_page;
          }


      }


 ?>
