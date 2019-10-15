<?php

include 'connDB.php';

$uid = $_POST['uid'];

$postContent = $_POST['writeaPost'];

// echo $postContent;

if($user->addPost($postContent, $uid))
{
    echo "1";
}

?>