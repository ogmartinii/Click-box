<?php
session_start();
require_once('database.php');

$db = new database;

$reply = [  
    'status' => 'ERROR',
];

if(isset($_POST['combo']) && count($_POST['combo']) > 0)
{

    $win_array = $_POST['combo'];

    $win_string = implode($win_array, ',');

    $last_id = $db->insertWinCombo($win_string);

    $_SESSION['combo_id'] = $last_id;
    
    $reply['status'] = 'OK';
}
else
{
    
    $reply['message'] = 'You have to check at least one field';

}

echo json_encode($reply);