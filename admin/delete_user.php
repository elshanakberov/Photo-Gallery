<?php include_once "include/init.php"; ?>
<?php if (!$session->isSignedin()) {redirect("login.php");} ?>
<?php

        if (empty($_GET['id'])) {

            redirect('users.php');

        }

        $user = User::findByid($_GET['id']);

        if ($user) {

            $user->delete();
            redirect('users.php');

        }else{

            redirect('users.php');

        }

 ?>
