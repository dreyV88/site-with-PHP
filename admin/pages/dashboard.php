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
    ?>
    <?php
    foreach ($tables as $table_name => $table) {// foreach parcour le tableau dont la clé est le nom (publications) et dont le contenu est dans la base de donnée (articles)
        ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card bg-primary">
                <div class="card-body text-white">
                    <span class="card-title"><?= $table_name?></span>
                    <?php
                    $nbrInTable=inTable($table);
                    ?>
                    <h4><?=$nbrInTable[0]?></h4> 
                </div>
            </div>
        </div>
    <?php
    }

    ?>

</div>


<pre>
<?php
var_dump($_SESSION);
?>
</pre>