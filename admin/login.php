<?php include ("include/admin_header.php"); ?>



<?php
  if ($session->isSignedin()) {
      header("Location:index.php");
  }
  if (isset($_POST['submit'])) {

      $username = trim($_POST['username']);
      $password = trim($_POST['password']);

      $user_found = User::verifyUser($username,$password);
      print_r($user_found);
        if ($user_found) {
            $session->login($user_found);
            header('Location:index.php');
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
