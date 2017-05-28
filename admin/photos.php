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
                                              <td><img class='img-responsive' width='130px'src="<?php echo$photo->picturePath(); ?>" alt="">
                                                <div class="action_links">
                                                    <a href="delete_photo.php?id=<?=$photo->id;?>">Delete</a>
                                                    <a href="edit_photo.php?id=<?=$photo->id;?>">Edit</a>
                                                    <a href="../photo.php?id=<?=$photo->id?>">View</a>
                                                </div>
                                              </td>
                                              <td><?php echo $photo->photo_title;  ?></td>
                                              <td><?php echo $photo->photo_filename;  ?></td>
                                              <td><?php echo$photo->photo_size;?></td>
                                              <td><a href="comments.php?id=<?=$photo->id?>">Comments</a></td>
                                              </tr>
                                            <?php endforeach; ?>
                                            <?php



                                             ?>

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
