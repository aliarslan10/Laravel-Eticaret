<?php
/**
 * uploader.php
 * Use class.upload.php to upload images etc.
 */
include('class.upload.php');          // where you have put class.upload.php

$msg = '';                                     // Will be returned empty if no problems
$callback = ($_GET['CKEditorFuncNum']);        // Tells CKeditor which function you are executing

$handle = new upload($_FILES['upload']);       // Create a new upload object 
if ($handle->uploaded) {
    $handle->image_resize         = false; //eklenen fotoðrafý kýrpýyor. (kapalý)
    //
    // Create a small image (thumbnail)
    //
    $handle->image_x              = 590;
    $handle->image_ratio_y        = true;

    $handle->process('../../../dosyalar/ckeditor/');  // directory for the uploaded image
    $image_url = '../../../dosyalar/ckeditor/' . $handle->file_dst_name;          // URL for the uploaded image
 
    if ($handle->processed) {
         $handle->clean();
    } else {
        $msg =  'error : ' . $handle->error;
    }
}

$output = '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction('.$callback.', "'.$image_url .'","'.$msg.'");</script>';
echo $output;
?>