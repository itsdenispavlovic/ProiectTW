<?php
include 'header.php'; 
$active = 2;
?>
<!-- CONTENT -->
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <?php include 'profilepic.php'; ?>
        </div>
        <div class="col-sm-6">
            <!-- Account Settings -->
            <br>
            <br>
            <h3>Account Settings</h3>
            <hr>
            <a href="#" id="changePass" class="btn btn-primary"><i class="fa fa-key" aria-hidden="true"></i> Change password</a>
            <a href="#" class="btn btn-primary" id="changeNam"><i class="fa fa-user" aria-hidden="true"></i> Change name</a>
            <br><br>
            <form id="changePassword" style="display:none">
                <div class="form-group">
                    <input type="password" name="oldPass" class="form-control" placeholder="Enter your old password">
                </div>
                <div class="form-group">
                    <input type="password" name="newPass" class="form-control" placeholder="Enter your new password">
                </div>
                <div class="form-group">
                    <input type="password" name="newPassRep" class="form-control" placeholder="Repeat your new password">
                </div>
                <input type="text" hidden name="uid" value=<?php echo $uid; ?>>
                <input type="submit" class="btn btn-info" id="chpassw" value="Change password">
            </form>

            <form id="changeName" style="display:none">
                <div class="form-group">
                    <input type="text" name="fname" class="form-control" placeholder="Enter your firstname" value="<?php echo $user->getFirstName($uid); ?>">
                </div>
                <div class="form-group">
                    <input type="text" name="lname" class="form-control" placeholder="Enter your lastname" value="<?php echo $user->getLastName($uid); ?>">
                </div>
                
                <input type="text" hidden name="uid" value=<?php echo $uid; ?>>
                <input type="submit" id="cnbt" class="btn btn-info" value="Change name">
            </form>
        </div>
        <div class="col-sm-3">
            <?php include 'sidebar.php'; ?>
        </div>

        <script>
        $(document).ready(() => {
            $('#changePass').click((e) => {
                e.preventDefault();

                $('#changePassword').toggle(500);

                $('#changeName').hide();
            });

            $('#changeNam').click((e) => {
                e.preventDefault();

                $('#changeName').toggle(500);

                $('#changePassword').hide();
            });

            $('#cnbt').click((e) => {
                e.preventDefault();

                // Ajax
                $.ajax
                ({
                    method: 'POST',
                    url: 'chName.php',
                    data: $('#changeName').serialize(),
                    success: (response) => {
                        // alert(response);
                        if(response == 1)
                        {
                            alert("You can't leave empty!");
                        }
                        else
                        {
                            alert("Successfully name changed!");
                        }
                    }
                });
            });

            $('#chpassw').click((e) => {
                e.preventDefault();

                // Ajax
                $.ajax
                ({
                    method: 'POST',
                    url: 'chPass.php',
                    data: $('#changePassword').serialize(),
                    success: (response) => {
                        // alert(response);
                        if(response=="success")
                        {
                            // Create models for success using bootstrap
                            // For now we are using alert normal
                            alert("You have successfully changed your password!");
                        }
                    }
                });
            });
        });
        </script>
    </div>
</div>
<!-- END CONTENT -->
<?php 
include 'footer.php'; 
?>