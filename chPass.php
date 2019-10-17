<?php

include 'connDB.php';

$uid = $_POST['uid'];
$oldPassword = $_POST['oldPass'];
$newPassword = $_POST['newPass'];
$repeatNewPassword = $_POST['newPassRep'];

// Change password
if($user->changePassword($uid, $oldPassword, $newPassword, $repeatNewPassword))
{
    echo "success";
}

?>