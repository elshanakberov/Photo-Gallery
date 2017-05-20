<?php include_once "include/admin_header.php"; ?>
<?php if (!$session->isSignedin()) { redirect("login.php"); } ?>
<?php

    $message = "";

      if (isset($_POST['submit'])) {

          $photo = new Photo();

          $photo->photo_title = $_POST['photo_title'];
          $photo->setFile($_FILES['file_upload']);

          if ($photo->save()) {

              $message = "Photo Uploaded Succesfully";

          }else{

              $message = join("<br>" , $photo->errors);

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
                        <h1 class="page-header">
                            Uploads
                            <small>Panel
                            <?php



                             ?></small>

                        </h1>
                      <div class="col-md-6">
                        <?=$message; ?>
                        <form  action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                  <input type="text" name="photo_title" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                  <input type="file" name="file_upload" value="" >
                            </div>
                            <div class="form-group">
                                  <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </form>
                      </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
