<?php

include 'connDB.php';

$username = $_POST['username'];

$password = $_POST['password'];

// echo $username . " " . $fname . " " . $lname;

// insert query

if($user->login($username, $password))
{
    echo 1;
}
else
{
    echo 2;
}


?>