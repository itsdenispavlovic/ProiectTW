<?php

include 'connDB.php';

$username = $_POST['username'];

$fname = $_POST['fname'];

$lname = $_POST['lname'];

$password = $_POST['password'];

// echo $username . " " . $fname . " " . $lname;

// insert query

if($user->createAccount($username, $fname, $lname, $password))
{
    echo 1;
}
else
{
    echo 2;
}


?>