<?php
session_start();

require_once('database.php');

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
    <meta charset="UTF-8">
    <title>Check winning combo</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.0.js" integrity="sha256-wPFJNIFlVY49B+CuAIrDr932XSb6Jk3J1M22M3E2ylQ=" crossorigin="anonymous"></script>
    <script src="attempt.js" ></script>
</head>

<body>
    <div class="wrapper">
    <?php
        
        for ($i = 0; $i <= 7; $i++) 
        {
            for ($j = 0; $j <= 6; $j++) 
            {
                echo '<div class="box" id="' . $i . ':' . $j . '"></div>'  . "\n";
            } 

            echo '<div class="box" id="' . $i . ':' . $j . '"></div><br>'  . "\n";
        }

        ?>
        <div class="buttons">
            <button class="btn btn-success" id="check">Check</button>
            <a href="index.php"><div class="btn btn-primary">Enter another winning combo</div></a>
        </div>
    </div>
     
    
    <script>
    $(document).ready(function () {
        var attempt = <?php echo $attempt_json; ?>;
        for (i = 0; i < attempt.length; i++) {
            $("[id=\"" + attempt[i] + "\"]").click();
        }
    });
    </script>
</body>

</html>