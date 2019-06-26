<?php include("includes/header.php"); ?>

<?php
$message = "";
$user = new User();

if(isset($_GET['id'])){
 $row=$user->find_by_id($_GET['id']);
}
if(isset($_POST['submit'])){
    $user = new User();
    $row=$user->find_by_id($_POST['id']);
    $row->username = $_POST['username'];
    $row->password = $_POST['password'];
    $row->first_name = $_POST['first_name'];
    $row->last_name = $_POST['last_name'];
    $row->set_file($_FILES['file_upload']);
    if(($row->update()) && ($row->upload_photo())){

       $message="<div class='alert alert-success' role='alert'>
       <strong>Well done!</strong> <a href='users.php'> You successfully updated User.</a></div>";
    }else{
        $message = "<div class='alert alert-danger' role='alert'>
        <strong>Oh snap!</strong> Change a few things up and try submitting again.
      </div>";
    }

}


?>


<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">SB Admin</a>
    </div>
    <!-- Top Menu Items -->
    <?php include("includes/navigation.php"); ?>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include("includes/sidebar.php"); ?>
    <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <i class=" fas fa-user"> ADD User</i>
                    <small>Subheading</small>
                </h1>
                <div class="col-md-6">
                    <img class = "admin-photo-thumbnail" src="<?php echo $row->user_image_place();?>" alt="">
                
                </div>
                <div class="col-md-6">
                    <?php echo $message;?>
                    <form action="edit_user.php" method="post" enctype="multipart/form-data">
                    <input type=hidden name="id" value="<?php echo $row->id; ?>">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="" aria-describedby="helpId"
                              value="<?php echo $row->username;?>"  placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="" aria-describedby="helpId"
                            value="<?php echo $row->password;?>"  placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="first_name">Firstname</label>
                            <input type="text" class="form-control" name="first_name" id="" aria-describedby="helpId"
                            value="<?php echo $row->first_name;?>"  placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Lastname</label>
                            <input type="text" class="form-control" name="last_name" id="" aria-describedby="helpId"
                            value="<?php echo $row->last_name;?>"  placeholder="">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="file" class="form-control-file" name="file_upload" id="" placeholder=""
                                aria-describedby="fileHelpId">

                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>