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
                    <input type="text" name="oldPass" class="form-control" placeholder="Enter your old password">
                </div>
                <div class="form-group">
                    <input type="text" name="newPass" class="form-control" placeholder="Enter your new password">
                </div>
                <div class="form-group">
                    <input type="text" name="newPassRep" class="form-control" placeholder="Repeat your new password">
                </div>
                <input type="text" hidden name="uid" value=<?php echo $uid; ?>>
                <input type="submit" class="btn btn-info" value="Change password">
            </form>

            <form id="changeName" style="display:none">
                <div class="form-group">
                    <input type="text" name="firstname" class="form-control" placeholder="Enter your firstname">
                </div>
                <div class="form-group">
                    <input type="text" name="lastname" class="form-control" placeholder="Enter your lastname">
                </div>
                
                <input type="text" hidden name="uid" value=<?php echo $uid; ?>>
                <input type="submit" class="btn btn-info" value="Change name">
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
        });
        </script>
    </div>
</div>
<!-- END CONTENT -->
<?php 
include 'footer.php'; 
?>