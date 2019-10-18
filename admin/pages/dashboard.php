<?php
include 'pages/header.php';
?>
<h2>Tableau de bord</h2>
<div class="row">
    <?php

    $tables = [
        "Publications"  => "articles",
        "Commentaires"  => "commentaire",
        "Administrateurs" => "users"

    ];

    $colors = [
        "articles" => "info",
        "commentaire" => "success",
        "users" => "danger"
    ];
    ?>
    <?php
    foreach ($tables as $table_name => $table) { // foreach parcour le tableau dont la clé est le nom (publications) et dont le contenu est dans la base de donnée (articles)
        ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card bg-<?= getColor($table, $colors) ?>">
                <div class="card-body text-white">
                    <span class="card-title"><?= $table_name ?></span>
                    <?php
                        $nbrInTable = inTable($table);
                        ?>
                    <h4><?= $nbrInTable[0] ?></h4>
                </div>
            </div>
        </div>
    <?php
    }

    ?>

</div>
<h4>Commentaires non-lus</h4>
<?php
$comments = get_Comments();
?>
<table class="table "style ="color:#575656">
    <thead >
        <tr>
            <th scope="col">Article</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
       
            <?php
            foreach ($comments as $comment) {
                ?>
                <tr scope="row" id="commentaire_<?=$comment->idcom?>">
                <td ><?=$comment->titre?></td>
                <td ><?= substr($comment->contenu,0,50);?>...</td>
                <td >
                    <a href="#" id="<?=$comment->idcom?>" class=" btn-"></a>


                </td>
            <?php
            }

            ?>

        </tr>
    </tbody>

</table>


<pre>
<?php
var_dump($_SESSION);
?>
</pre>