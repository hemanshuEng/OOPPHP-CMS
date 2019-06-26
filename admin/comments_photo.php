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
        <a class="navbar-brand" href="index.html">SB Admin</a>
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
                    <i class="fas fa-comments"> Comments</i>
                    <small>Subheading</small>
                </h1>
                <div class="col-md-12">
                    <table class="table table-inverse table-responsive table-hover table-bordered">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Author</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              if(isset($_GET['id'])){
                                $comment =new Comment();
                                $comments = $comment->find_the_comments($_GET['id']);   
                              }else{
                                  redirect("photos.php");
                              }
                              
                               $photo = new Photo();
                                foreach($comments as $row):
                               ?>
                            <tr>
                                <td>
                                    <?php echo $row->id;?>
                                </td>
                                <td>
                                    <div>
                                        <img class="img-photo-thumbnail" src="<?php echo ($photo->find_by_id($row->photo_id))->picture_path();?>"
                                            alt="img">
                                    </div>
                                </td>


                                <td>
                                    <?php echo $row->author;?>
                                    <div class="action_link">
                                        <a href="delete_comment_id.php?id=<?php echo $row->id?>">Delete</a>
                                    </div>
                                </td>
                                <td>
                                    <?php echo $row->body;?>
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