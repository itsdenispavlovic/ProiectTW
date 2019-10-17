<?php

try
{
    $statement = $conn->prepare("SELECT * FROM profilepic WHERE uid=:uid");
    $statement->bindParam(':uid', $uid, PDO::PARAM_INT);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if($statement->rowCount() > 0)
    {
        ?>
            <img id="" src="users/<?php echo $row['avatar']; ?>" width="200px alt="">
        <?php
    }
    else
    {
        // Add algorithm if it's a male or a female
        ?>
            <img id="" src="users/defaultAvatarM.png" width="200px" alt="">
        <?php
    }
} catch(PDOException $e)
{
    echo $e->getMessage();
}

?>

<div class="container">
    <div class="row">
        <h3>
            <?php echo $user->getFullName($uid); ?>
        </h3>
        <h4>
        <!-- Working on linking via username, like /localhost/profile/{{username}} -->
            @<?php echo $user->getUsername($uid); ?>
        </h4>
    </div>
</div>
