<?php
include 'pages/header.php';

$articles= get_posts();
foreach($articles as $article){
//  echo "<h2>". $article -> titre."</h2><br> <p>". nl2br($article->contenu)."</p>";


}