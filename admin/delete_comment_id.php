<?php ob_start()?>
<?php require_once("includes/init.php");?>
<?php 
    if(!$session->is_signed_in()){
        redirect("login.php");
    }

?>
<?php

$comment = new Comment();
if(isset($_GET['id'])){
    $result=$comment->find_by_id($_GET['id']);
    if($result){
        $result->delete();
        redirect("comments_photo.php?id={$result->photo_id}");
    }else{
        redirect("comments_photo.php?id={$result->photo_id}");
    }
}

?>