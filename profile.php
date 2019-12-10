<?php 
include 'header.php'; 
$active = 1;

// if user is not logged in, redirect him to te log in page
if(!$user->isLoggedin())
{
  $user->redirect('login');
}
?>

<!-- Content -->
<div class="container">
<!-- Start with modal -->
<div class="modal fade" id="changePicture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-warning">
            <h5 class="modal-title" id="exampleModalLabel">Change profile picture</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-center">
            <!-- Here goes the process for changing image -->
            <!-- After it works, add custom css code -->
            <form id="uploadF" action="" method="POST" enctype="multipart/form-data">
                <input type="file" id="imgTU" name="fileToUpload"/> <input type="submit" id="upbutton" value="Upload" name="submit"/>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<script>
$(document).ready(() => {
    $('#uploadF').on('submit', (e) => {
        e.preventDefault();

        var fd = new FormData();
        var files = $('#imgTU')[0].files[0];
        fd.append('fileToUpload', files);

        $.ajax
        ({
            url: 'testUploadImage.php',
            type: 'POST',
            data: fd,
            contentType: false,
            cache: false,
            processData: false,
            success: (data) => {
                // alert(data);
                // After it is uploaded show a message that is has been uploaded!
                $('.upPro').load('profilepic.php');
            }
        });
    });
});
</script>
<!-- End with modal -->
    <div class="row">
        <div class="col-sm-3 upPro">
            <!-- {{PROFILEPIC}} -->
            <!-- Profile settings algorithm -->
            <!-- From database -->
            <?php include 'profilepic.php'; ?>
        </div>
        <div class="col-sm-6" style="padding-top: 10%">
            <!-- {{POST ZONE, need to add and textarea like on the newsfeed}} -->

            <!-- ADD A POST -->
            <?php include 'addPOST.php'; ?>
            <!-- END OF ADDING A POST -->
            
            <!-- add from database -->
            <div class="row">
            <br><br>
            </div>
            <div id="postss"></div>
        </div>
        <div class="col-sm-3">
            <!-- {{QUICK LINKS}} -->
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>
<!-- End Content -->
<script>
    $(document).ready(() => {
        $('#postss').load('postList.php');
    });
</script>
<?php
include 'footer.php'; 
?>