<?php

include 'connDB.php';

$uid = $_POST['uid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];

// Change password
if($user->changeName($uid, $fname, $lname))
{
    echo "success";
}

?>