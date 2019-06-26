<?php include("includes/header.php"); ?>
<?php
     $photo =new Photo();
     $page = !empty($_GET['page'])? (int)$_GET['page'] : 1;
     $item_per_page =5;
     $item_total_count = $photo->count_all();
     $paginate = new Paginate($page,$item_per_page,$item_total_count);
     $sql  ="SELECT * FROM photos ";
     $sql .=" LIMIT {$item_per_page}";
     $sql .=" OFFSET {$paginate->offset()}";

?>

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-12">
        <?php
        
         $images = $photo->find_this_query($sql);
          foreach($images as $img):
        ?>
        <div class="col-xs-6 col-md-3">
            <a href="photo.php?id=<?php echo $img->id?>" class="thumbnail">
                <img class="img-responsive home_page_photo" src="<?php echo " admin\\".$img->picture_path()?>" alt="">
            </a>


        </div>


        <?php
        endforeach;
        ?>

    </div>

    <!-- Blog Sidebar Widgets Column 
    <div class="col-md-4">


        <?php //include("includes/sidebar.php"); ?>


-->
</div>
<div class="row">
    <ul class="pager ">
        <?php
        if($paginate->page_total()>1){
            if($paginate->has_next()){
                echo "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>"; 
            }
            ?>
            <ul class="pagination pagination-lg">
            <?php
            for ($i=1; $i <=$paginate->page_total(); $i++) { 
                if($i == $paginate->current_page){
                   echo  "<li class='active'><a href='index.php?page={$i}'>".$i."</a></li>" ;
                }else{
                echo "<li><a href='index.php?page={$i}''>".$i."</a></li>";
                }
            }
       
            ?>
            </ul>
            <?php
            if($paginate->has_previous()){
                echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>"; 
            }

        }
        ?>
        
    </ul>
</div>
<!-- /.row -->

<?php include("includes/footer.php"); ?>