
<?php $this->view('/Shared/top_nav_bar_main'); ?>
<form action="/profile/upload_picture" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="path" id="path">
    <input type="submit" name="action" value="Upload Image">
