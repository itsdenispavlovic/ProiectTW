<?php

// O sa scriu pas cu pas ce fac

// Includ conexiune cu baza de date
include 'connDB.php';

if(isset($_SESSION['user']))
{
    $uid = $_SESSION['user'];
}


$target_dir = "users//uid".$uid."//avatar//";
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
    if($check !== false)
    {
        echo "File is an image - " . $check['mime'] . ".";
        $uploadOk = 1;
    }
    else
    {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if(file_exists($target_file))
{
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if($_FILES['fileToUpload']['size'] > 50000000)
{
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOK is set to 0 by an erro
if($uploadOk == 0)
{
    echo "Sorry, your file was not uploaded.";
}
else
{
    // If everything is ok, try to upload file
    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file))
    {
        echo "The file " . basename($_FILES['fileToUpload']['name']) . " has been uploaded!";
    }
    else
    {
        echo "Sorry, there was an erro uploading your file!";
    }
}

// // If $_FILES is not empty
// if($_FILES['fileToUpload']['error'] != 4)
// {
//     $path = "users/uid".$uid."/avatar/";

//     if(!is_dir($path))
//     {
//         mkdir($path, 0755, true);
//         echo "PATH CREATED!";
//     }

//     // Image and image_tmp
//     $img = $_FILES['fileToUpload']['name'];
//     $img_tmp = $_FILES['fileToUpload']['tmp_name'];
//     $path = $path . $img;

//     // echo $img_tmp;

//     // Check file size
//     if($_FILES['fileToUpload']['size'] > 50000000)
//     {
//         die("Sorry, your file is too large.");
//     }
//     else
//     {
//         // If everything is ok, try to upload file
//         if(move_uploaded_file($img_tmp, $path))
//         {
//             // Pentru a verifica dar sa inseram sau sa actualizam poza de profil, vedem daca exista deja in baza de date userul X
//             try
//             {
//                 $verifyPic = $conn->prepare("SELECT * FROM user_settings WHERE uid=:uid");
//                 $verifyPic->bindParam(':uid', $uid, PDO::PARAM_INT);
//                 $verifyPic->execute();

//                 if($verifyPic->rowCount() > 0)
//                 {
//                     // If exist than only update
//                     $updatePic = $conn->prepare("UPDATE user_settings SET avatar=:avatar WHERE uid=:uid");
//                     $updatePic->execute(array(
//                         ':uid' => $uid,
//                         ':avatar' => $path
//                     )); 
//                     return true;
//                 }
//                 else
//                 {
//                     // If not than insert a new one
//                     $insertPic = $conn->prepare("INSERT INTO user_settings (uid, avatar) VALUES (:uid, :avatar)");
//                     $insertPic->execute(array(
//                         ':uid' => $uid,
//                         ':avatar' => $path
//                     ));

//                     return true;
//                 }
//             } catch(PDOException $e)
//             {
//                 echo $e->getMessage();
//             }
//         }
//         else
//         {
//             die("Sorry, there was an error uploading your file.");
//         }
//     }

// }

// 

?>