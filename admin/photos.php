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
                            Photos
                            <small>Subheading</small>
                        </h1>
                        <div class="col-md-12">
                            <table class="table table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Photo</th>
                                        <th>Photo Title</th>
                                        <th>File name</th>
                                        <th>Size</th>
                                    </tr>
                                </thead>
                                <tbody>


                                          <?php
                                           $photos = Photo::findAll();
                                            foreach ($photos as $photo) : ?>
                                              <tr>
                                              <td><?php echo $photo->id; ?></td>
                                              <td><img class='img-responsive' width='130px'src="<?php echo$photo->picturePath(); ?>" alt=""></td>
                                              <td><?php echo $photo->photo_title;  ?></td>
                                              <td><?php echo $photo->photo_filename;  ?></td>
                                              <td><?php echo$photo->photo_size;?></td>
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
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
