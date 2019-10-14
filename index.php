<?php 
include 'header.php'; 

// if user is not logged in, redirect him to te log in page
if(!$user->isLoggedin())
{
  
}

?>

<!-- Content -->
<div class="container">
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <h2>Welcome back, {{firstname}}</h2>
        <hr>
        <h1>Newsfeed</h1>
        <textarea name="writeaPost" id="post" cols="70" rows="6" style="width: 100%; border: 0.5px solid black;resize: none; border-radius: 20px;" ></textarea>
        <a href="#" style="float: right"id="writePost" class="btn btn-info">POST</a>
    </div>
    <div class="col-sm-3"></div>
    </div>
</div>
<!-- End Content -->

<?php include 'footer.php'; ?>