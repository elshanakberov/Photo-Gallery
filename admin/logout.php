<?php
  require_once("include/init.php");
  $session->logout();
  redirect("login.php");

 ?>
