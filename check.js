$(document).ready(function () {

    var wincombo = [];
    $(".box").click(function (event) {
        var id = $(event.target).attr("id");
        var i = wincombo.indexOf(id);
        if (i != -1) {
            $(this).removeClass("clicked");
            wincombo.splice(i, 1);
        } else {
            $(this).addClass("clicked");
            wincombo.push(id);
        }
        console.log(wincombo);
    });
    $("#insert").click(function () {
        $.ajax({
            'type': 'post',
            'url': 'insertwincombo.php',
            'dataType': "json",
            'data': { 'combo': wincombo },
            success: function (data) {
                if (data.status == "OK") {
                    window.location = 'attempt.php';
                } else {
                    alert(data.message)
                }
            }
        })

    })

});