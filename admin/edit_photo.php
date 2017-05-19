<?php include_once "include/admin_header.php"; ?>
<?php if (!$session->isSignedin()) { redirect("login.php"); } ?>
<?php

if (empty($_GET['id'])) {
        redirect('photos.php');
}else{

          $photo = Photo::findByid($_GET['id']);

        if (isset($_POST['update'])) {
            if ($photo) {

                $photo->photo_title           =   $_POST['photo_title'];
                $photo->photo_caption         =   $_POST['photo_caption'];
                $photo->alternate_text        =   $_POST['alternate_text'];
                $photo->photo_description     =   $_POST['photo_description'];



               $photo->save();

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
                        <h1 class="page-header">
                            Photos
                            <small></small>
                        </h1>
                        <form class="form-group" action="" method="POST">
                        <div class="col-md-8">
                                  <div class="form-group">
                                      <input type="text" name="photo_title" value="<?= $photo->photo_title;?>" class="form-control" >
                                  </div>
                                  <div class="form-group">
                                      <label for="photo_caption">Caption</label>
                                      <input type="text" name="photo_caption" value="<?= $photo->photo_caption;?>" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="alternate_text">Alternate Text</label>
                                      <input type="text" name="alternate_text" value="<?= $photo->alternate_text;?>" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Description</label>
                                      <textarea name="photo_description" rows="10" cols="30" class="form-control"><?= $photo->photo_description;?></textarea>
                                  </div>



                        </div>
                        <div class="col-md-4">
                            <div class="photo-info-box">
                                <div class="info-box-header">
                                    <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                                <div class="inside">
                                    <div class="box-inner">
                                        <p class="text">
                                            <span class="glyphicon glyphicon-calendar"></span>Uploaded on: 15/15/15
                                        </p>
                                        <p class="text">
                                            Photo Id <span class="data photo_id_box">34</span>
                                        </p>
                                        <p class="text">
                                            File Type: <span class="data">JPG</span>
                                        </p>
                                        <p class="text">
                                            File Size: <span class="data">325454</span>
                                        </p>
                                    </div>
                                    <div class="info-box-footer clearfix">
                                        <div class="info-box-delete pull-left">
                                            <a href="delete_photo.php?id=<?=$photo->id; ?>" class="btn btn-danger">Delete</a>
                                        </div>
                                        <div class="info-box-update pull-right">
                                            <input type="submit" name="update" value="Update" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
