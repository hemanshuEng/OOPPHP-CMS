<?php include("includes/header.php"); ?>

<?php
$photo = new Photo();

if(isset($_GET['id'])){
   $img=$photo->find_by_id($_GET['id']);
}
if(isset($_POST['update'])){
    $img =$photo->find_by_id($_POST['id']);
    $img->title = $_POST['title'];
    $img->caption =$_POST['caption'];
    $img->alternate_text =$_POST['alternate_text'];
    $img->description =$_POST['description'];
    $img->set_file($_FILES['file_upload']);
    $img->save();
    redirect("photos.php");
    
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
                <form action="edit_photo.php" method="post" enctype="multipart/form-data">
                    <div class="col-md-8">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="" aria-describedby="helpId"
                                value="<?php echo $img->title; ?>"placeholder="">
                        </div>
                    <div class="form-group">
                      <label for="Picture"></label>
                      <img class= "thumbnail" src="<?php echo $img->picture_path();?>" alt="img" >
                      <input type="file" class="form-control-file" name="file_upload" id="" placeholder="" aria-describedby="fileHelpId">
                    </div>
                        <div class="form-group">
                            <label for="caption">Caption</label>
                            <input type="text" class="form-control" name="caption" id="" aria-describedby="helpId"
                            value="<?php echo $img->caption; ?>"placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="alternative">Alernative Text</label>
                            <input type="text" class="form-control" name="alternate_text" id="" aria-describedby="helpId"
                            value="<?php echo $img->alternate_text; ?>"placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="mytextarea" rows="10" value="<?php echo $img->description; ?>"><?php echo $img->description; ?></textarea>
                        </div>
                
                            <input type=hidden name="id" value="<?php echo $img->id; ?>">
                    </div>
                    <div class="col-md-4">
                        <div class="photo-info-box">
                            <div class="info-box-header">
                                <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                            </div>
                            <div class="inside">
                                <div class="box-inner">
                                    <p class="text">
                                        <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030
                                        @ 5:26
                                    </p>
                                    <p class="text ">
                                        Photo Id: <span class="data photo_id_box"><?php echo $img->id;?></span>
                                    </p>
                                    <p class="text">
                                        Filename: <span class="data"><?php echo $img->filename;?></span>
                                    </p>
                                    <p class="text">
                                        File Type: <span class="data"><?php echo $img->type;?></span>
                                    </p>
                                    <p class="text">
                                        File Size: <span class="data"><?php echo $img->size;?></span>
                                    </p>
                                </div>
                                <div class="info-box-footer clearfix">
                                    <div class="info-box-delete pull-left">
                                        <a href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>
                                    </div>
                                    <div class="info-box-update pull-right ">
                                        <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> 
            </div>
            
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>