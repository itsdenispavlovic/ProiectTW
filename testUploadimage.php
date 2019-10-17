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

        // Continue to see if exist in database
        try
        {
            $verifyImg = $conn->prepare("SELECT * FROM user_settings WHERE uid=:uid");
            $verifyImg->bindParam(':uid', $uid, PDO::PARAM_INT);
            $verifyImg->execute();

            if($verifyImg->rowCount() > 0)
            {
                // User exist in database, we can only update
                $updateImg = $conn->prepare("UPDATE user_settings SET avatar=:avatar WHERE uid=:uid");
                $updateImg->execute(array(
                    ":uid" => $uid,
                    ":avatar" => $target_file
                ));

                return true;
            }
            else
            {
                // User does not exist in database so we need to insert
                $insertImg = $conn->prepare("INSERT INTO user_settings (uid, avatar) VALUES (:uid, :avatar)");
                $insertImg->execute(array(
                    ':uid' => $uid,
                    ':avatar' => $target_file
                ));
                
                return true;
            }
        } catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    else
    {
        echo "Sorry, there was an erro uploading your file!";
    }
}
?>