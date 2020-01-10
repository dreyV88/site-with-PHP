$(document).ready(function () {
    $("#catAdd").click(function () {
        var valeur = $('#categ').val();
        alert(valeur);
        $.post('ajax/create_categ.php', { txt: valeur }, function () {
            // alert("je fonctionne" + iD);
            // $("#liste").append($('<option>').val(iD).text(iD));

        })
        // $.fail(function () {
        //     alert("Ca a merdé!")
        // });

    });
});