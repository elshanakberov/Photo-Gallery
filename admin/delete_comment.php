<?php include_once "core/init.php"; ?>
<?php if (!$session->isSignedin()) {redirect("login.php");} ?>
<?php

        if (empty($_GET['id'])) {

            redirect('comments.php');

        }

        $comment = Comment::findByid($_GET['id']);

        if ($comment) {

            $comment->delete();
            redirect('comments.php');

        }else{

            redirect('comments.php');

        }

 ?>
