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
    <?php if($activeUser==1)
    {
      ?>
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
      <?php
    }
    else
    {
      ?>
      <div class="activation">
        <h2 style="text-align:center">Please activate your account!</h2>
        <hr>
        <input type="text" id="actcode" name="activationcode" placeholder="Enter your code..">
        <br/>
        <center><a href="#" id="activate" class="btn btn-info">Activate your account</a></center>
        <h4>Didn't received your code? <a href="#">Resend</a></h4>
      </div>
      <?php
    }
    ?>
        
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

    $('#activate').click((e) => {
      e.preventDefault();

      $.ajax
      ({
        type: 'POST',
        url: 'activationEvent.php',
        data: ({activationcode: $( "input[type=text][name=activationcode]" ).val()}),
        success: (response) => {
            //alert(response);
            // 1 ca merge
            // 2 ca nu este corect
            // 3 ca e gol
            if(response)
            {
              alert("Your account is now activated!");
              window.location.href = "index.php";
            }
        }
      });
    });
    
  });
</script>

<?php include 'footer.php'; ?>