<?php 
include 'header.php'; 
$uid = $_SESSION['user'];
?>

<!-- Content -->
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            {{PROFILEPIC}}
            <!-- Profile settings algorithm -->
            <!-- From database -->
            <img id="" src="users/<?php echo $uid; ?>/profilePic/111.jpeg" width="200px" style="border: 2px solid skyblue;" alt="">
        </div>
        <div class="col-sm-6">
            {{POST ZONE}}
            <!-- add from database -->
        </div>
        <div class="col-sm-3">
            {{QUICK LINKS}}
        </div>
    </div>
</div>
<!-- End Content -->

<?php
include 'footer.php'; 
?>