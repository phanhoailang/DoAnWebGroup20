<div class="modal-body">
<div class="update-form">
    <form action="<?= BASE_URL ?>/Admin/addNewss" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="newsId" value="<?php echo $newsId; ?>">
    <div class="form-group">
      <label for="formGroupExampleInput">Tên bài viết</label>
      <input type="text" name="title" required class="form-control" id="formGroupExampleInput" placeholder="Tên bài viết...">
    </div>
    <br>
    <div class="form-group">
      <label for="formGroupExampleInput">Nội dung</label>
     <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <br>
    <!-- <label for="thumbnail">Thumbnail:</label>
    <input type="file" name="thumbnail" id="thumbnail" accept="image/*"> -->
    <div class="form-group">
     <label for="exampleFormControlFile1">Ảnh</label>
     <input type="file" required name="image" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <br>
    <input type="submit" value="Cập nhật tin tức" style="border-radius:5px;color:white;border:0;background-color:#39a6cf">

    </form>
</div>
</div>