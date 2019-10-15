<?php 
include 'header.php'; 
$uid = $_SESSION['user'];

// if user is not logged in, redirect him to te log in page
if(!$user->isLoggedin())
{
  $user->redirect('login');
}

?>

<!-- Content -->
<div class="container">
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <h2>Welcome back, <?php $user->getFirstName($uid); ?></h2>
        <hr>
        <h1>Newsfeed</h1>
        <!-- ADD A POST -->
        <?php include 'addPOST.php'; ?>
        <!-- END OF ADDING A POST -->
        <div class="row">
          <!-- Space -->
          <br />
          <br /><br />
        </div>
        <div class="row"></div>
        <div id="loadPosts"></div>
    </div>
    <div class="col-sm-3"></div>
    </div>
</div>
<!-- End Content -->
<script>
  $(document).ready(() => {
    $("#loadPosts").load('postList.php');
    setInterval(() => {
      $("#loadPosts").load('postList.php');
    }, 1000);
    
  });
</script>

<?php include 'footer.php'; ?>