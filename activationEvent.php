<?php
include 'connDB.php';

$code = $_POST['activationcode'];
$uid=$_SESSION['user'];

if($user->activateAcccount($uid, $code))
{
    echo 1;
}

?>