<?php
  require_once("core/init.php");
  $session->logout();
  redirect("login.php");

 ?>
