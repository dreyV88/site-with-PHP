$(document).ready(function () {
    $("#catAdd").click(function () {
        var iD = $(this).val();
        alert(iD);
        $.post('ajax/create_categ.php', { txt: iD }, function () {
            alert("je fonctionne" + iD);
            $("#liste").append($('<option>').val(iD).text(iD));

        })
        $.fail(function () {
            alert("Ca a merdé!")
        });

    });
});