<?php ob_start()?>
<?php require_once("includes/init.php");?>
<?php 
    if(!$session->is_signed_in()){
        redirect("login.php");
    }

?>
<?php

$user = new User();
if(isset($_GET['id'])){
    $result=$user->find_by_id($_GET['id']);
    if($result){
        $result->delete();
        redirect("users.php");
    }else{
        redirect("users.php");
    }
}

?>