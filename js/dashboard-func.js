$(document).ready(function() {
    $(".see_comment").click(function() {
        var iD = $(this).attr('id');
        $.post('./ajax/see_comment.php', { id:iD }, function() {
            $("#commentaire_"+iD).hide();

        });

    });
    $(".delete_comment").click(function() {
        var id = $(this).attr('id');
        $.post('./ajax/delete_comment.php', { id:id }, function() {
            $("#commentaire_"+id).hide();

        });

    });
});
