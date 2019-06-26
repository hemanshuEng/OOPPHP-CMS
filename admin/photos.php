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
                    <i class="fas fa-images    "> Images</i>
                    <small>Subheading</small>
                </h1>
                <div class="col-md-12">
                    <table class="table table-inverse table-responsive table-hover table-bordered ta">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Photo</th>
                                <!--<th>Description</th>-->
                                <th>ID</th>
                                <th>Filename</th>
                                <th>Title</th>
                                <th>Size</th>
                                <th>Comments</th>
                            </tr>
                            </thead>
                            <tbody>
                               <?php

                               $photo =new Photo();
                               $comment = new Comment();
                               $images = $photo->find_all();
                                foreach($images as $img):
                               ?>
                                <tr>
                                    <td scope="row"><img class="admin-photo-thumbnail" src="<?php echo $img->picture_path();?>" alt="img">
                                        <div class="picture_link">
                                            <a href="delete_photo.php?id=<?php echo $img->id?>">Delete</a>
                                            <a href="edit_photo.php?id=<?php echo $img->id?>">Edit</a>
                                            <a href="../photo.php?id=<?php echo $img->id?>">View</a>
                                        </div>
                                    </td>
                                   <!-- <td><?php //echo $img->description;?></td>-->
                                    <td><?php echo $img->id;?></td>
                                    <td><?php echo $img->filename;?></td>
                                    <td><?php echo $img->title;?></td>
                                    <td><?php echo $img->size;?></td>
                                    <td><a href="comments_photo.php?id=<?php echo $img->id?>"><?php
                                         
                                        echo count($comment->find_the_comments($img->id));

                                        ?></a></td>
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