<?php 

include 'connDB.php';

$postid=$_GET['idppp'];

if($user->hidepost($postid))
{
    echo 1;
}

?>