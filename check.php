<?php
session_start();
require_once './database.php';

$db = new database;

if(isset($_POST))
{
    
    $attempt_array = $_POST['combo'];

    $attempt_string = implode($attempt_array, ',');
    
    $last_id = $db->insertAttempt($attempt_string);

    $_SESSION['attempt_id'] = $last_id;

    $wincombo_id = $_SESSION['combo_id'];

    $win_string = $db->getWinCombo($wincombo_id);

    $win_array = explode(',', $win_string['win_combo']);

    if(!array_diff($attempt_array, $win_array) && !array_diff($win_array, $attempt_array)) 
    {
    
        echo 'SOLVED';
    
    }
    else
    {

        echo 'WRONG COMBO';
        
    }


}