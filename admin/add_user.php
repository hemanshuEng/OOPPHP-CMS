<?php include("includes/header.php"); ?>

<?php
$message = "";
if(isset($_POST['submit'])){
    $user =new User();
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];
    $user->set_file($_FILES['file_upload']);
    if(($user->upload_photo())){
       $user->create();
       $message="<div class='alert alert-success' role='alert'>
       <strong>Well done!</strong> <a href='users.php'> You successfully created User</a>.
     </div>";
    }else{
        $message = "<div class='alert alert-danger' role='alert'>
        <strong>Oh snap!</strong> Change a few things up and try submitting again.  <b>".$user->errors[0]."</b></div>";
     
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
                        <?php echo $message;?>
                       <form action="add_user.php" method="post" enctype="multipart/form-data">   
                          <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="" aria-describedby="helpId" placeholder="">
                            
                          </div>  
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
                          </div>  
                          <div class="form-group">
                            <label for="first_name">Firstname</label>
                            <input type="text" class="form-control" name="first_name" id="" aria-describedby="helpId" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="last_name">Lastname</label>
                            <input type="text" class="form-control" name="last_name" id="" aria-describedby="helpId" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for=""></label>
                            <input type="file" class="form-control-file" name="file_upload" id="" placeholder="" aria-describedby="fileHelpId">
                          
                          </div>                     
                        <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
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