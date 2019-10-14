<?php 

include 'connDB.php';

if($user->logout($_SESSION['user']))
{
    $user->redirect('login');
}

?>