<?php
session_start();

if(!empty($_SESSION))
{
    $_SESSION = [];
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Check winning combo</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.0.js" integrity="sha256-wPFJNIFlVY49B+CuAIrDr932XSb6Jk3J1M22M3E2ylQ=" crossorigin="anonymous"></script>
    <script src="check.js" ></script>
</head>

<body>
    <div class="wrapper">
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

    <button class="btn btn-success buttons" id="insert">Insert winning combo</button>
    </div>
</body>

</html>