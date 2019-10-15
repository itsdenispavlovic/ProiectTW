<?php 
include 'header.php'; 
$uid = $_SESSION['user'];

// if user is not logged in, redirect him to te log in page
if(!$user->isLoggedin())
{
  $user->redirect('login');
}

?>
<!-- POST CSS -->
<link href="css/post.css" rel="stylesheet" />
<!-- Content -->
<div class="container">
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <h2>Welcome back, <?php $user->getFirstName($uid); ?></h2>
        <hr>
        <h1>Newsfeed</h1>
        <form id="ssForm">
        <textarea name="writeaPost" id="post" class="wPOST" onkeydown="countChar(this)" onkeyup="countChar(this)" max="1000" maxlength="1000" cols="70" rows="6" style="width: 100%; border: 0.5px solid black;resize: none; border-radius: 20px;" spellcheck="false"></textarea>
        <input type="text" name="uid" hidden value="<?php echo $uid; ?>"/>
        <span style="float: left;" id="counter"></span>
        <input type="submit" id="writePost" style="float: right" class="btn btn-info" value="POST">
        </form>
        <script>
          $('#counter').text(1000);
          function countChar(val)
          {
            var len = val.value.length;
            if(len >= 1000)
            {
              val.value.substring(0, 1000);
            }
            else
            {
              $('#counter').text(1000-len);
            }
          };
        </script>
        <div class="row">
          <!-- Space -->
          <br />
          <br /><br />
        </div>
        <div class="row"></div>
        <?php
        // foreach
        include_once 'connDB.php';
        try
        {
          // momentan arata doar postarile pe care le posteaza user-ul logat
          $showPost = $conn->prepare("SELECT * FROM posts WHERE hidden=0 AND uid=:uid ORDER BY id DESC");
          $showPost->bindParam(':uid', $uid, PDO::PARAM_INT);
          $showPost->execute();
          $rows = $showPost->fetchAll();
          if($showPost->rowCount() > 0)
          {
            foreach($rows as $row)
            {
              ?>
              <div class="row pp" style="border: 1px solid black; padding: 10px;">
                <div class="headerPost">
                <b>#<?php echo $row['id']; ?></b>
                <a href="#" id="delete<?php echo $row['id']; ?>" style="float: right">X</a>
                </div>
                <div class="postContent">
                  <?php echo $row['postContent']; ?>
                </div>
                <div class="footerPost">
                  <a href="#" id="like<?php echo $row['id']; ?>">Like (N)</a> | <a href="#">Dislike (M)</a>
                  <div class="ffRight">
                    <a href="#">Share</a>
                  </div>
                </div>
                <!-- Create a script for like and dislike for real time voting -->

                <!-- Script for deleting posts // Hiding posts -->
                <script>
                  $(document).ready(() => {
                    $('#delete<?php echo $row['id']; ?>').click((e) => {
                      e.preventDefault();

                      // Ajax for deleting post
                      $.ajax
                      ({
                        url: 'delPP.php?idppp=<?php echo $row['id']; ?>',
                        success: (response) =>
                        {
                          alert(response);
                        }
                      });
                    });
                  });
                </script>
              </div>
              <?php
              // echo $row['postContent'];
            }
          }
          

        } catch (PDOException $e)
        {
          echo $e->getMessage();
        }
    ?>
    </div>
    <div class="col-sm-3"></div>
    </div>
</div>
<!-- End Content -->
<script>
  $(document).ready(() => {
    $('#writePost').click((e) => {
      e.preventDefault();

      // Ajax pentru inserare in baza de date
      $.ajax
      ({
        method: 'POST',
        url: 'sendPost.php',
        data: $('#ssForm').serialize(),
        success: (response) => {
          // alert(k);
          if(response == 1)
          {
            $('.wPOST').val('');
            $('#counter').text(1000);
            // Message that is had been posted

          }
        }
      })
    });
  });
</script>

<?php include 'footer.php'; ?>