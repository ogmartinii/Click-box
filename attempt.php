<?php
session_start();

require_once 'database.php';

$db = new database;

if(isset($_SESSION['attempt_id']))
{
    
    $attempt_id = $_SESSION['attempt_id'];
    
    $attempt_string = $db->getAttempt($attempt_id);

    $attempt_array = explode(',', $attempt_string['attempt']);

    $attempt_json = json_encode($attempt_array);

}
else
{

    $attempt_json = '""';

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
                echo '<div class="box" id="' . $i . ':' . $j . '"></div>';
            } 

            echo '<div class="box" id="' . $i . ':' . $j . '"></div><br>';
        }


        ?>

    <button id="check">Check</button>
    <a href="index.php">Enter another winning combo</a>

     
    
        <script>
             $(".box").click(function () {
                
            });

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
                
                $("#check").click(function () {

                    $.ajax({
                        'type': 'post',
                        'url': 'check.php',
                        'data': { 'combo': wincombo },
                        success: function (data, status) {
                            alert(data);
                        }

                })
            })
        </script>
        <script>
        
        var attempt = <?php echo $attempt_json; ?>;
        
        for (i = 0; i < attempt.length; i++)
        {
            
            $("[id=\""+attempt[i]+"\"]").click();

        
        
        }

        
        </script>


</body>

</html>