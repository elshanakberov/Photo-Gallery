<?php

    class Comment extends Object{

      public $id,$photo_id,$author,$body;
      protected static $db_table = "comments";
      protected static $db_table_field = ['id','photo_id','author','body'];

      public static function createComment($photo_id,$author,$body){

          if (!empty($photo_id) && !empty($author) && !empty($body)) {

                $comment = new self();

                $comment->photo_id  =  (int)$photo_id;
                $comment->author    = $author;
                $comment->body      = $body;

                return $comment;
          }else{
                return false;
          }

      }

      public static function findComments($photo_id = 0){

          global $database;
          $sql = "SELECT * FROM " . self::$db_table;
          $sql .= " WHERE photo_id = ". $database->escape($photo_id);
          $sql .= " ORDER BY photo_id ASC ";

          return self::query($sql);

      }

      public static function deletePhotoComment($photo_id = 0){
        global $database;

        $sql = "DELETE FROM comments WHERE photo_id = {$photo_id} ";

        return self::query($sql);

      }


    }

    $comment = new Comment();




 ?>
