<?php include_once "include/init.php"; ?>
<?php if (!$session->isSignedin()) {redirect("login.php");} ?>
<?php

        if (empty($_GET['id'])) {

            redirect('photos.php');

        }

        $photo = Photo::findByid($_GET['id']);

        if ($photo) {

            $photo->deletePhoto();
            redirect('photos.php');

        }else{

            redirect('photos.php');

        }

 ?>
