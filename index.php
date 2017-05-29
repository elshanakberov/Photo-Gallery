<?php include_once "include/header.php"; ?>
<?php $photo = Photo::findAll(); ?>
<?php

    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    $data_per_page = 4;
    $total = count($photo);
    $class = "Photo";

    $paginate = new Paginate($page,$data_per_page,$class);
    $sql = "SELECT * FROM photos ";
    $sql .= "LIMIT {$data_per_page} OFFSET {$paginate->offset()} ";
    $photo = Photo::query($sql);

 ?>
<body>

    <!-- Navigation -->
  <?php include_once "include/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

              <div class="thumbnails row">
                  <?php foreach ($photo as $photo): ?>
                          <div class="col-xs-4 col-md-3">
                              <a class="thumbnail" href="photo.php?id=<?=$photo->id?>">
                                <img class='img-responsive home_page_photo'  src="admin/<?=$photo->picturePath();?>" alt="">
                              </a>
                          </div>
                  <?php endforeach; ?>

                </div>

                    <div class="row">
                        <ul class="pager">

                            <?php

                                $pages = $paginate->totalPage($paginate->class="Photo");
                                    if ($pages > 1) {

                                      if ($paginate->hasNext()) {
                                          echo "  <li class='next'><a href='index.php?page={$paginate->nextPage()}'>Next</a></li>";
                                      }

                                      for ($i=1; $i <= $pages ; $i++) {
                                            if ($i == $paginate->current_page) {
                                                echo "<li class='active'><a href='index.php?page={$i}'>$i</a></li>";
                                            }else{
                                              echo "<li class='list-group-item' ><a href='index.php?page={$i}'>$i</a></li>";
                                            }
                                      }

                                      if ($paginate->hasPrevious()) {
                                          echo "  <li class='previous'><a href='index.php?page={$paginate->previousPage()}'>Previous</a></li>";
                                      }

                                }



                             ?>


                        </ul>
                    </div>
            </div>



        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      <?php include_once "include/footer.php"; ?>

</body>

</html>
