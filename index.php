<?php
session_start();


require_once 'database.php';

$db = new database;

if(!empty($_SESSION))
{
    $_SESSION = [];
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .box {
            border: solid 1px black;
            height: 20px;
            width: 20px;
            background-color: white;
            display: inline-block;
            margin: 0 2px 0 2px;
            cursor: pointer;
        }
        
        .clicked {
            background-color: green;
        }
    </style>
    <meta charset="UTF-8">
    <title>Check winning combo</title>
    <script src="https://code.jquery.com/jquery-3.2.0.js" integrity="sha256-wPFJNIFlVY49B+CuAIrDr932XSb6Jk3J1M22M3E2ylQ=" crossorigin="anonymous"></script>
</head>

<body>
    <?php
        
        for ($i = 0; $i <= 7; $i++) 
        {
            for ($j = 0; $j <= 6; $j++) 
            {
                echo '<div class="box" id="' . $i . ':' . $j . '"></div>' . "\n";
            } 

            echo '<div class="box" id="' . $i . ':' . $j . '"></div><br>' . "\n";
        }


        ?>

    <button id="insert">Insert winning combo</button>

        <script>

            var wincombo = new Array();

            $(".box").click(function (event) {
             var id = $(event.target).attr('id');
                var i = wincombo.indexOf(id);

                if(i != -1)
                {
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
                            console.log(data);
                            if (data.status == "OK") {
                                // TODO: dodelat redirect pomoci javascriptu
                                window.location = 'attempt.php';

                                // alert('redirect');
                            } else {
                                alert(data.message)
                            }
                            //console.log(status);
                        }

                })
            })
        </script>

</body>

</html>