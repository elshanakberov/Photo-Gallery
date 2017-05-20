<?php include_once "include/admin_header.php"; ?>
<?php

  if (!$session->isSignedin()) {
        redirect("login.php");
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
                        <h1 class="page-header">

                            <small><?php


                            //  $user= new User();
                            //  $user->user_name = "Nargiz";
                            //  $user->user_password = "123";
                            //  $user->create();
                             $photo= new Photo();
                             $photo->photo_title = "Third Title";
                             $photo->photo_description = "We are testing";
                            // $photo->create();

                             $users = User::findAll();
                             foreach ($users as $user) {
                                 echo $user->user_name;
                             }
                             $photos = Photo::findAll();
                             foreach ($photos as $photo) {
                                 echo $photo->photo_title;
                             }
                            // $user->user_name = "Carla";
                            // $user->user_password = "123";
                            // $user->create();

                            // $user_found = User::verifyUser('Elshan','123');
                            // print_r("<pre>");
                            // print_r($user_found);
                            // print_r("</pre>");
                            //
                            // $user = User::findByid(16);
                            //  $user = new User();
                            // $user->user_name = "Countiinho2";
                            // $user->user_password = "123";
                            // $user->user_firstname = "hesss22hehe";
                            // $user->user_lastname = "jaj22aja";
                            // $user->create();
                            //$user->user_name = "ElshanNo2";
                          //  $user->user_password = "12345";
                            //$user->save();

                            // $property = $user->propertiesValues();
                            // $keys = implode("," ,$property);
                            // print_r('<pre>');
                            // print_r($keys);
                            // print_r('</pre>');

                            ?>
                          </small>


                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
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
