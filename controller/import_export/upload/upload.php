<?php

    //  output files folder
    $fileName= $_FILES["file-import"]["name"];
    $fileExtension= explode('.',$fileName);
    $fileExtension= strtolower(end($fileExtension));
    $targetDirectory= "../files/".basename($_FILES['file-import']['name']);
    move_uploaded_file($_FILES["file-import"]["tmp_name"], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors',0);
    
?>