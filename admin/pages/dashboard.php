<?php
// include 'pages/header.php';
?>
<article>
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
                <div class="card bg-<?= getColor($table, $colors) ?>" style="border-radius: 4px; padding: 3px 0.8rem; margin: 0 1.2rem;">
                    <div class="card-body text-white">
                        <span class="card-title"><?= $table_name ?></span>
                        <?php
                            $nbrInTable = inTable($table);
                            ?>
                        <h4 style="color: white;"><?= $nbrInTable[0] ?></h4>
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
    <table class="table " style="color:#575656">
        <thead>
            <tr>
                <th scope="col">Article</th>
                <th scope="col">Commentaire</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (!empty($comments)) {


                foreach ($comments as $comment) {
                    ?>
                    <tr scope="row" id="commentaire_<?= $comment->idcom ?>">
                        <td><?= $comment->titre ?></td>
                        <td><?= substr($comment->contenu, 0, 50); ?>...</td>
                        <td>
                            <a href="#" id="<?= $comment->idcom ?>" class=" btn btn-default btn-circle see_comment"><i class="fa fa-check"></i></a>
                            <a href="#" id="<?= $comment->idcom ?>" class=" btn btn-danger btn-circle delete_comment"><i class="fa fa-times"></i></a>
                            <a href="#comment_<?= $comment->idcom ?>" class=" btn btn-info btn-circle modal_trigger" data-toggle="modal" data-target="#comment_<?= $comment->idcom ?>"><i class="fa fa-ellipsis-v"></i></a>


                            <div class="modal fade" id="comment_<?= $comment->idcom ?>" tabindex="-1" role="dialog" aria-labelledby="#comment_<?= $comment->idcom ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><?= $comment->titre ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <p>Commentaire posté par <strong><?= $comment->login . " (" . $comment->email . ")</strong><br>Le:" . date("d/m/Y à H:i", strtotime($comment->date)) ?></p>
                                            <hr>
                                            <div><?= nl2br($comment->contenu) ?></div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" id="<?= $comment->idcom ?>" class=" btn btn-default btn-circle see_comment"><i class="fa fa-check"></i></a>
                                            <a href="#" id="<?= $comment->idcom ?>" class=" btn btn-danger btn-circle delete_comment"><i class="fa fa-times"></i></a>

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>

                        </td>
                    <?php
                        }
                    } else {
                        ?>
                    <tr>
                        <td></td>
                        <td style="text-align:center">Aucun commentaire à valider</td>
                    </tr>
                <?php
                }

                ?>

                </tr>
        </tbody>

    </table>
    <!-- <pre>
<?php
var_dump($_SESSION);
?>
toto
</pre> -->
</article>

<?php

?>