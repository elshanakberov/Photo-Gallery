<?php require_once("../core/init.php");?>
<?php
      $user = new User();

      if (isset($_POST['image_name'])) {

          $user->ajaxSave($_POST['image_name'],$_POST['user_id']);

      }

      if (isset($_POST["image_id"])) {
          User::sidebarData($_POST["image_id"]);
      }

 ?>
