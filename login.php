<?php include ("admin/include/init.php"); ?>
<?php

  if (!$session->isSignedin()) {
      redirect("login.php");
    }
 ?>
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?php
  if ($session->isSignedin()) {
      header("Location:admin/index.php");
  }
  if (isset($_POST['submit'])) {

      $username = trim($_POST['username']);
      $password = trim($_POST['password']);

      $user_found = User::verifyUser($username,$password);
        if ($user_found) {
            $session->login($user_found);
            header('Location:admin/index.php');
        }else{
          echo "<p style='color:white;'>Your pass or username are incorrect</p>";
        }

  }else{
    $username = null;
    $password = null;
  }

 ?>

     <div class="col-md-4 col-md-offset-4">
       <form  action="" method="post" class="">
         <div class="form-group">
           <label style="color:white;" for="username">Username</label>
           <input type="text" name="username" value="" class="form-control">
         </div>
         <div class="form-group">
           <label style="color:white; " for="password">Password</label>
           <input type="password" name="password" class="form-control" value="">
         </div>
         <div class="form-group">
           <input name="submit" type="submit" class="btn btn-primary" value="Login">
         </div>
       </form>
     </div>
