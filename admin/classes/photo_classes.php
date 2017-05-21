<?php

    class Photo extends Object{

      public $id,$photo_title,$photo_filename,$photo_description,$photo_type,$photo_size,$photo_caption,$alternate_text;
      protected static $db_table = "photos";
      protected static $db_table_field = ['photo_title','photo_filename','photo_description','photo_type','photo_size','photo_caption','alternate_text'];
      public $tmp_path,$upload_directory = "images", $errors = [], $upload_errors_array = [
        UPLOAD_ERR_OK         => "There is no error",
        UPLOAD_ERR_INI_SIZE   => "The upload file exceeds the upload_max_size directive",
        UPLOAD_ERR_FORM_SIZE  => "The uploaded file exceeds the max_file_size directive",
        UPLOAD_ERR_PARTIAL    => "The uploaded file was only partially uploaded",
        UPLOAD_ERR_NO_FILE    => "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporery folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
        UPLOAD_ERR_EXTENSION  => "A PHP extension stopped to file upload"
      ];

//This is passing $_FILES['uploaded_file'] as an argument

      public function setFile($file){

          if (empty($file) || !$file || !is_array($file)) {

              $this->errors[] = "No file was uploaded";
              return false;

          }elseif($file['error'] != 0){

              $this->errors[] = $this->upload_errors_array[$file['error']];
              return false;

          }else{

              $this->photo_filename = basename($file['name']);
              $this->tmp_path       = $file['tmp_name'];
              $this->photo_type     = $file['type'];
              $this->photo_size     = $file['size'];

        }

      }

      public function picturePath(){

        return $this->upload_directory.DS.$this->photo_filename;

      }

      public function save(){

          if ($this->id) {

                $this->update();

          }else{

              if (!empty($this->errors)) {

                  return false;

              }

              if (empty($this->photo_filename || empty($this->tmp_path))) {

                  $this->errors[] = "The File was not avaiable";
                  return false;

              }

              $target_path = SITE_ROOT . DS .'admin'. DS.'images'. DS.$this->photo_filename;


              if (file_exists($target_path)) {
                  $this->errors[] = "The File already exists ";
                  return false;
              }

              if (move_uploaded_file($this->tmp_path,$target_path)) {

                  if ($this->create()) {

                      unset($this->tmp_path);
                      return true;

                  }
              }else{

                    $this->errors[] = "The Folder was probably does not have permission";
                    return false;

              }

          }

       }

       public function deletePhoto(){

                $this->delete();

                $target_path = SITE_ROOT.DS.'admin'.DS.$this->picturePath();
                return unlink($target_path) ? true : false;

            }

    }

    $photo = new Photo();


 ?>
