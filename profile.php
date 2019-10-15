<?php 
include 'header.php'; 
?>

<!-- Content -->
<div class="container">
    <div class="row">
        <div class="col-sm-3">
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