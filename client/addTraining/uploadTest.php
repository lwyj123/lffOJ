<?php
//php 接收表单提交信息并打印
if( isset( $_REQUEST['trainingTitle']) ){
    sleep(1);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],
      __DIR__ . "\\" . $_FILES["fileToUpload"]["name"]);
}
