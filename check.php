<?php
session_start();
require_once('database.php');

$db = new database;

$reply = [
    'status' => 'ERROR',
];

if(isset($_POST['combo']) && count($_POST['combo']) > 0)
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
    
        $reply['staus'] = 'solved';

        $reply['message'] = 'SOLVED';
    
    }
    else
    {

        $reply['status'] = 'wrong';
        
        $reply['message'] = 'WRONG COMBO';
        
    }

}
else
{
    
    $reply['message'] = 'You have to check at least one field';

}

echo json_encode($reply);