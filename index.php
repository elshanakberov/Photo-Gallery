<?php include_once "include/header.php"; ?>
<?php $photo = Photo::findAll(); ?>
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

            </div>



        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      <?php include_once "include/footer.php"; ?>

</body>

</html>
