<?php include_once "include/admin_header.php"; ?>
<?php if (!$session->isSignedin()) { redirect("login.php"); } ?>
<?php

      if (empty($_GET['id'])) {
            redirect('users.php');
      }

      $user = User::findByid($_GET['id']);


       if (isset($_POST['update'])) {

            if ($user) {

                $user->user_name        =   $_POST['user_name'];
                $user->user_firstname   =   $_POST['user_firstname'];
                $user->user_lastname    =   $_POST['user_lastname'];
                $user->user_password    =   $_POST['user_password'];
                  if (empty($_FILES['user_image'])) {
                          $user->save();
                  }else{
                    $user->setFile($_FILES['user_image']);
                    $user->saveUserImage();
                    $user->save();
                    redirect("edit_user.php?id={$user->id}");
                  }
            }
       }


 ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once "include/admin_navigation.php"; ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header col-md-3 col-md-offset-4">
                            User
                            <small>
                                  Edit
                            </small>
                        </h1>

                        <div class="col-md-6">
                            <img class="img-responsive" src="<?=$user->userImage(); ?>" alt="">
                        </div>
                        <form class="form-group" action="" method="POST" enctype="multipart/form-data">
                        <div class="col-md-6 ">

                            <div class="form-group">
                                <input type="file" name="user_image" value="">
                            </div>

                                  <div class="form-group">
                                      <label for="user_name">Username</label>
                                      <input type="text" name="user_name" value="<?= $user->user_name;?>" class="form-control" >
                                  </div>

                                  <div class="form-group">
                                      <label for="user_firstname">Firstname</label>
                                      <input type="text" name="user_firstname" value="<?= $user->user_firstname;?>" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="user_lastname">Lastname </label>
                                      <input type="text" name="user_lastname" value="<?= $user->user_lastname;?>" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="user_password">Password</label>
                                      <input type="password" name="user_password" value="<?=$user->user_password ?>" class="form-control">
                                  </div>
                                  <div class="form-group">

                                      <a class="btn btn-danger pull-left" href="delete_user.php?id=<?=$user->id ?>">Delete</a>
                                  </div>
                                  <div class="form-group">
                                      <input type="submit" name="update" value="Update" class="btn btn-primary pull-right">
                                  </div>



                        </div>

                      </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include_once('include/admin_footer.php'); ?>

</html>
