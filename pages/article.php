<?php
$article= get_article();
if ($article==false){
    header("location: index.php?page=error");
    
}else{
    ?>
    </div>
    <div class= "parallax">
    <img src="images/img_blog/<?=article->image?>" alt="<?=$article->titre?>"/>
    </div>
    <div class = "container">
    <?php
}