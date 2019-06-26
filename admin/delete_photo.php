<?php ob_start()?>
<?php require_once("includes/init.php");?>
<?php 
    if(!$session->is_signed_in()){
        redirect("login.php");
    }

?>
<?php

$photo = new Photo();
if(isset($_GET['id'])){
    $img=$photo->find_by_id($_GET['id']);
    if($img){
        $img->delete_photo();
        redirect("photos.php");
    }else{
        redirect("photos.php");
    }
}

?>