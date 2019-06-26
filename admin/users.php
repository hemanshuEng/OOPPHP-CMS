<?php include("includes/header.php"); ?>

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
                    <i class="fas fa-users    "> Users</i>
                    <small>Subheading</small>
                    <a href="add_user.php"><button type="button" class="btn btn-primary">Add user</button></a>
                </h1>
               
                <div class="col-md-12">
                    <table class="table table-inverse table-responsive table-hover table-bordered">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <!--<th>Description</th>-->
                                <th>Photo</th>
                                <th>Username</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                               $user =new User();
                               $users = $user->find_all();
                                foreach($users as $row):
                               ?>
                            <tr>
                                <td>
                                <?php echo $row->id;?>
                                </td>
                                <td >
                                     <div  >
                                    <img class="img-photo-thumbnail" src="<?php echo $row->user_image_place();?>" alt="img">
                                     </div>
                                </td>
                                    
                            
                                <td>
                                    <?php echo $row->username;?>
                                    <div class="action_link">
                                        <a href="delete_user.php?id=<?php echo $row->id?>">Delete</a>
                                        <a href="edit_user.php?id=<?php echo $row->id?>">Edit</a>
                                    </div>
                                </td>
                                <td>
                                    <?php echo $row->first_name;?>
                                </td>
                                <td>
                                    <?php echo $row->last_name;?>
                                </td>
                               
                            </tr>
                            <?php
                                endforeach;
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>