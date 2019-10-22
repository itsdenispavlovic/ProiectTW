<?php

include 'connDB.php';

$username = $_POST['username'];

$fname = $_POST['fname'];

$lname = $_POST['lname'];

$password = $_POST['password'];

$gender = $_POST['gender'];

// echo $gender;

if($user->createAccount($username, $fname, $lname, $password, $gender))
{
    echo 1;
}
else
{
    echo 2;
}


?>