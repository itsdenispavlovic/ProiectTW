<style>
#ppOverlay
{
    background-color: gray;
    text-align: center;
    padding: 2px;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    transition: .5s ease;
    display: none;
}

#tt
{
    cursor: pointer;
}
</style>
<div id="ppOverlay">
    <h5>Change profile picture</h5>
</div>
<?php
include_once 'connDB.php';
$uid = $_SESSION['user'];
try
{
    $statement = $conn->prepare("SELECT * FROM user_settings WHERE uid=:uid");
    $statement->bindParam(':uid', $uid, PDO::PARAM_INT);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    $statement2 = $conn->prepare("SELECT * FROM users WHERE id=:uid");
    $statement2->bindParam(':uid', $uid, PDO::PARAM_INT);
    $statement2->execute();
    $row2 = $statement2->fetch(PDO::FETCH_ASSOC);
    
    if($statement->rowCount() > 0)
    {
        ?>
            <img id="tt" class="mmm" src="<?php echo $row['avatar']; ?>" width="200px">
        <?php
    }
    else
    {
        // Add algorithm if it's a male or a female
        $gender = $row2['gender'];
        // 0 - male / 1 - female
        if($gender == 0)
        {
        ?>
            <img id="tt" class="mmm" src="users/maleDP.png" width="200px" alt="">
        <?php
        }
        else
        {
            ?>
              <img id="tt" class="mmm" src="users/femaleDP.jpg" width="200px" alt="">
            <?php
        }
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
<script>
$(document).ready(() => {
    $('#tt').click(() => {
        $('#changePicture').modal('show');
    });

    $("#tt").hover(function(){
        $('#ppOverlay').toggle();
        // $(this).css("background-color", "yellow");
    });
});
</script>