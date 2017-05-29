<?php include_once "include/admin_header.php"; ?>
<?php if (!$session->isSignedin()) { redirect("login.php"); } ?>
<?php

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
                        <h1 class="page-header">
                            users
                            <small><a href="add_user.php" class="btn btn-primary">Add User</a></small>
                        </h1>
                        <div class="col-md-12">
                            <table class="table table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>User Image</th>
                                        <th>Username</th>
                                        <th>User Firstname</th>
                                        <th>User lastname</th>

                                    </tr>
                                </thead>
                                <tbody>


                                          <?php
                                           $users = User::findAll();
                                            foreach ($users as $user) : ?>
                                              <tr>
                                              <td><?php echo $user->id; ?></td>
                                              <td><img class='img-responsive user_image' src="<?php echo $user->userImage(); ?>" alt="">
                                                <div class="action_link">
                                                    <a href="delete_user.php?id=<?=$user->id;?>">Delete</a>
                                                    <a href="edit_user.php?id=<?=$user->id;?>">Edit</a>
                                                    <a href="#">View</a>
                                                </div>
                                              </td>
                                              <td><?php echo $user->user_name;  ?>

                                              </td>
                                              <td><?php echo $user->user_firstname;  ?></td>
                                              <td><?php echo$user->user_lastname;?></td>
                                              </tr>
                                            <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
  <?php include_once('include/admin_footer.php'); ?>
</html>
