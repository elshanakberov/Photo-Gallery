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
                          <?php if (!isset($_GET['id']) && empty($_GET['id'])): ?>
                                Comments
                          <?php else: ?>
                              Comments of id <?=$_GET['id'];?>
                          <?php endif; ?>
                        </h1>
                        <div class="col-md-12">
                            <table class="table table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Author</th>
                                        <th>Body</th>
                                  </tr>
                                </thead>
                                <tbody>

                                <?php if (!isset($_GET['id']) && empty($_GET['id'])) : ?>

                                  <?php
                                       $comments = Comment::findAll();
                                        foreach ($comments as $comment) : ?>
                                              <tr>
                                                  <td><?=$comment->id; ?></td>
                                                  <td><?=$comment->author;  ?>
                                                    <div class="action_link">
                                                        <a href="delete_comment.php?id=<?=$comment->id;?>">Delete</a>
                                                    </div>
                                                  </td>
                                                  <td><?=$comment->body;?></td>
                                              </tr>
                                    <?php endforeach; ?>

                                <?php else: ?>

                                  <?php
                                       $comments = Comment::findComments($_GET['id']);
                                        foreach ($comments as $comment) : ?>
                                          <tr>
                                          <td><?=$comment->id; ?></td>
                                          </td>
                                          <td><?=$comment->author;  ?>
                                            <div class="action_link">
                                                <a href="delete_comment.php?id=<?=$comment->id;?>">Delete</a>
                                            </div>
                                          </td>
                                          <td><?=$comment->body;?></td>

                                          </tr>
                                    <?php endforeach; ?>

                                  <?php endif; ?>

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
