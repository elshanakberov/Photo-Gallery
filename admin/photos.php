<?php include_once "include/admin_header.php"; ?>
<?php if (!$session->isSignedin()) { redirect("login.php"); } ?>
<?php
    $page =  !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    $data_per_page = 3;
    $class = "Photo";

    $paginate = new Paginate($page,$data_per_page,$class);
    $sql = "SELECT * FROM photos ";
    $sql .= "LIMIT {$data_per_page} OFFSET {$paginate->offset()} ";
    $photos = Photo::query($sql);

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
                                          // $photo = Photo::findAll();
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

                            <div class="row">
                              <ul class="pager">
                                    <?php $pages =  $paginate->totalPage($paginate->class="photo"); ?>
                                    <?php
                                    if ($pages > 1){

                                          for ($i=1; $i <=$pages ; $i++) {
                                              if ($i == $paginate->current_page){
                                                  echo "<li class='active'><a href='photos.php?page={$i}'>$i</a></li>";
                                              }else{
                                                  echo "<li class='active'><a href='photos.php?page={$i}'>$i</a></li>";
                                              }
                                          }

                                    }
                                 ?>
                              </ul>
                            </div>

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
