<?php

include 'connDB.php';

$username = $_POST['username'];

$fname = $_POST['fname'];

$lname = $_POST['lname'];
$email = $_POST['email'];

$password = $_POST['password'];

$gender = $_POST['gender'];

// echo $gender;

if($user->createAccount($username, $email, $fname, $lname, $password, $gender))
{
    echo 1;
}
else
{
    echo 2;
}


?>