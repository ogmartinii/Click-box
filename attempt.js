$(window).ready(function () {

    $(".box").click(function () {

    });

    var wincombo = new Array();

    $(".box").click(function (event) {
        var id = $(event.target).attr('id');
        var i = wincombo.indexOf(id);

        if (i != -1) {
            $(this).removeClass("clicked");
            wincombo.splice(i, 1);

        } else {
            $(this).addClass("clicked");
            wincombo.push(id);
        }
        console.log(wincombo);

    })
    $("#check").click(function () {

        $.ajax({
            'type': 'post',
            'url': 'check.php',
            'dataType': 'json',
            'data': { 'combo': wincombo },
            success: function (data) {
                if (data.staus == 'solved') {
                    alert(data.message)
                } else {
                    alert(data.message)
                }

            }

        })
    })
});