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

                            <small>
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
