<?php require_once("core/init.php"); ?>
<?php

    $photos = Photo::findAll();

 ?>
<link rel="stylesheet" href="css/styles.css">
<div class="modal fade" id="photo-library">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close"  data-dismiss="modal" aria-label="Close" type="button"  name="button"></button>
                <h4 class="modal-title">Gallery System Library</h4>
            </div>
        </div>
        <div class="modal-body">
            <div class="col-md-9">
                <div class="thumbnails row">
                    <! PHP CODE HERE -->
                        <?php foreach ($photos as $photo): ?>
                        <div class="col-xs-2">
                            <a href="#" role="checkbox" aria-checked="false" tabindex="0" id="" class="thumbnail">
                                <img class="modal_thumbnails img-responsive" src="<?= $photo->picturePath(); ?>" data="<?=$photo->id;?>" alt="">
                            </a>
                            <div class="photo-id hidden"></div>
                        </div>
                      <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-3">
                <div id="modal_sidebar"></div>
            </div>

        </div>
        <div class="modal-footer">
            <div class="row">
                <button  id="set_user_image" class="btn btn-primary" type="button" name="button" disabled="true">Upload</button>
            </div>
        </div>
    </div>
</div>
