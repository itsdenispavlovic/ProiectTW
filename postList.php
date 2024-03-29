<!-- POST CSS -->
<link href="css/post.css" rel="stylesheet" />
<?php

        // foreach
        include_once 'connDB.php';
        if(isset($_GET['username']))
        {
            $uid = $user->getUID($_GET['username']);
        }
        else
        {
            $uid = $_SESSION['user'];
        }
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
                  <!-- <a href="#" id="like<?php echo $row['id']; ?>">Like (N)</a> | <a href="#">Dislike (M)</a> -->
                  <div class="ffRight">
                    <a href="/ProiectTW/profile.php?username=<?php echo $user->getUsername($uid); ?>"><?php echo $user->getUsername($row['uid']); ?></a>
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
                        //   alert(response);
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