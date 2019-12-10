<?php
class User
{
    
    function __construct($conn)
    {
        $this->db = $conn;
    }

    // Creating account
    public function createAccount($username, $email, $fname, $lname, $password, $gender)
    {


        function createRandomPassword() { 

            $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
            srand((double)microtime()*1000000); 
            $i = 0; 
            $pass = '' ; 
        
            while ($i <= 15) { 
                $num = rand() % 33; 
                $tmp = substr($chars, $num, 1); 
                $pass = $pass . $tmp; 
                $i++; 
            } 
        
            return $pass; 
        
        }

        // Verification code


        

        // Verify if account exists already
        $verifyEmail = $this->db->prepare("SELECT username FROM users WHERE username = :username");
        $verifyEmail->bindParam(':username', $username, PDO::PARAM_STR);
        $verifyEmail->execute();

        //
        if($verifyEmail->rowCount() > 0)
        {
            return false;
        }
        else
        {
    
                

                /**
    * This example shows making an SMTP connection with authentication.
    */
    
    

        // These must be at the top of your script, not inside a function
        

        // Instantiation and passing `true` enables exceptions


    //$mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        require_once "{$_SERVER['DOCUMENT_ROOT']}/ProiectTW/PHPMailer/src/PHPMailer.php";
        require_once "{$_SERVER['DOCUMENT_ROOT']}/ProiectTW/PHPMailer/src/SMTP.php";
        require_once "{$_SERVER['DOCUMENT_ROOT']}/ProiectTW/PHPMailer/src/Exception.php";
        require_once "{$_SERVER['DOCUMENT_ROOT']}/ProiectTW/PHPMailer/src/OAuth.php";

        // These must be at the top of your script, not inside a function
        

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'denisthepavlovic@gmail.com';                     // SMTP username
        $mail->Password   = 'qsihayfkhnvanbjc';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        // password pentru proiecttw : qsihayfkhnvanbjc
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );

        $fullname = $fname . " " . $lname;
        //Recipients
        $mail->setFrom('admin@bookface.com', 'Bookface');
        $mail->addAddress($email, $fullname);     // Add a recipient

        // Content
        $mail->Subject = 'Activation Code';
        $variables = [$randomKey];

        $randomKey = createRandomPassword();

        $message = file_get_contents('emailT.html');


        $message = str_replace('%activationCODE%', $randomKey, $message);

        $mail->msgHTML($message);

        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';
        $regStatement = $this->db->prepare('INSERT INTO users (username, email, fname, lname, gender, ovt, password) VALUES (:username, :email, :fname, :lname, :gender, :ovt, :password)');
        //HASHED PASSWORD
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $regStatement->execute(array(
            ':username' => $username,
            ':email' => $email,
            ':fname' => $fname,
            ':lname' => $lname,
            ':gender' => $gender,
            ':ovt' => $randomKey,
            ':password' => $hashedPassword

        ));

        if($regStatement->rowCount() > 0)
        {
            if($mail->send())
            {
                return true;
            }
        }
        else
        {
            return false;
        }
        



                    // If reg is successfully, generam un cod random pentru activarea contului TODO
                } catch(PDOException $e)
                {
                    echo $e->getMessage();
                }
            }
        }

    // Change password
    public function changePassword($uid, $oldPassword, $newPassword, $repeatNewPassword)
    {
        try 
        {
            // first verify if old password is right written
            $statement = $this->db->prepare("SELECT * FROM users WHERE id=:uid");
            $statement->bindParam(':uid', $uid, PDO::PARAM_INT);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            if($statement->rowCount() > 0)
            {
                // Verify if old password si correct written
                $oldPassFromDB = $row['password'];
                if(password_verify($oldPassword, $oldPassFromDB))
                {
                    // Continue
                    // Verify for newPassword
                    if($newPassword == $repeatNewPassword)
                    {
                        // Continue
                        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                        // Update the old password with the new one
                        $updatePassword = $this->db->prepare('UPDATE users SET password=:newpassword WHERE id=:uid');
                        $updatePassword->execute(array(
                            ":uid" => $uid,
                            ":newpassword" => $hashedPassword
                        ));

                        return true;

                        // password changed
                    }
                    else
                    {
                        // 3 - Incorrect newpassword + repeat
                        echo 3;
                        return false;
                    }

                }
                else
                {
                    // 2 - incorrect old password
                    echo 2;
                    return false;
                }
            }
            else
            {
                // 1 - user not found
                echo 1;
                return false;
            }
        } catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    // Activate your account
    public function activateAcccount($uid, $code)
    {
        try
        {
            $statement = $this->db->prepare("SELECT * FROM users WHERE id=:uid");
            $statement->bindParam(':uid', $uid, PDO::PARAM_INT);
            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_ASSOC);

            if($statement->rowCount() > 0)
            {
                if($code == $row['ovt'])
                {
                    $updateStatement = $this->db->prepare("UPDATE users SET active=1 WHERE id=:uid");
                    $updateStatement->execute(array(
                        ':uid' => $uid
                    ));
                    return true;
                }
                else
                {
                    return false;
                }
            }
        } catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    // Change name
    public function changeName($uid, $fname, $lname)
    {
        try
        {
            // Intai sa vedem daca e gol sau nu
            if($fname == "" || $lname == "")
            {
                echo 1;
                return false;
            }

            $statement = $this->db->prepare("UPDATE users SET fname=:fname, lname=:lname WHERE id=:uid");
            $statement->execute(array(
                ':uid' => $uid,
                ':fname' => $fname,
                ':lname' => $lname
            ));

            return true;
        } catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }


    // Login
    public function login($username, $password)
    {
        // Verify if username exist already, if yes continue
        try
        {
            $statement = $this->db->prepare("SELECT * FROM users WHERE username=:username");
            $statement->bindParam(":username", $username, PDO::PARAM_STR);
            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_ASSOC);

            if($statement->rowCount() > 0)
            {
                if(password_verify($password, $row['password']))
                {
                    $_SESSION['user'] = $row['id'];
                    return true;
                }
                else
                {
                    return false;
                }
            }
        } catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    // Get First name
    public function getFirstName($uid)
    {
        try 
        {
            // Add after you add feature activation account
            $statement = $this->db->prepare("SELECT * FROM users WHERE id = :uid");
            $statement->bindParam(":uid", $uid, PDO::PARAM_INT);
            $statement->execute();

            $row=$statement->fetch(PDO::FETCH_ASSOC);

            if($statement->rowCount() > 0)
            {
                echo $row['fname'];
            }

        } catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    // Get last name
    public function getLastName($uid)
    {
        try 
        {
            // Add after you add feature activation account
            $statement = $this->db->prepare("SELECT * FROM users WHERE id = :uid");
            $statement->bindParam(":uid", $uid, PDO::PARAM_INT);
            $statement->execute();

            $row=$statement->fetch(PDO::FETCH_ASSOC);

            if($statement->rowCount() > 0)
            {
                echo $row['lname'];
            }

        } catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    // Get fullname
    public function getFullName($uid)
    {
        try 
        {
            // Add after you add feature activation account
            $statement = $this->db->prepare("SELECT * FROM users WHERE id = :uid");
            $statement->bindParam(":uid", $uid, PDO::PARAM_INT);
            $statement->execute();

            $row=$statement->fetch(PDO::FETCH_ASSOC);

            if($statement->rowCount() > 0)
            {
                echo $row['fname'] . ' ' . $row['lname'];
            }

        } catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    // Get UID
    public function getUID($username)
    {
        try
        {
            $statement = $this->db->prepare("SELECT * FROM users WHERE username=:username");
            $statement->bindParam(":username", $username, PDO::PARAM_STR);
            $statement->execute();
            $row=$statement->fetch(PDO::FETCH_ASSOC);
            
            if($statement->rowCount() > 0)
            {
                return $row['id'];
            }
        } catch(PDOException $e)    
        {
            echo $e->getMessage();
        }
    }

    // Get Activ User
    public function activeUser($uid)
    {
        try
        {
            $statement = $this->db->prepare("SELECT * FROM users WHERE id=:id");
            $statement->bindParam(":id", $uid, PDO::PARAM_INT);
            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_ASSOC);

            if($statement->rowCount() > 0)
            {
                return $row['active'];
            }
        } catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    // Get username
    public function getUsername($uid)
    {
        try 
        {
            $statement = $this->db->prepare("SELECT * FROM users WHERE id=:uid");
            $statement->bindParam(':uid', $uid, PDO::PARAM_STR);
            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_ASSOC);

            if($statement->rowCount() > 0)
            {
                // Daca exista o sa apara ceva
                echo $row['username'];
            }
            else
            {
                echo "No username found!";
            }
        } catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    // Add post
    public function addPost($postContent, $uid)
    {
        try 
        {
            // bagam dupa si dubla securitate daca exista deja, nu poate orice sa posteze, o sa fie si filtrat
            // acu lasam doar un simplu insert
            $statement = $this->db->prepare("INSERT INTO posts (postContent, uid) VALUES(:postContent, :uid)");
            $statement->execute(array(
                ':postContent' => $postContent,
                ':uid' => $uid
            ));

            return true;

        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    // Edit post

    // Delete post (hide)
    public function hidepost($postid)
    {
        try
        {
            $statement = $this->db->prepare("UPDATE posts SET hidden=1 WHERE id=:postid");
            $statement->bindParam(':postid', $postid, PDO::PARAM_INT);
            $statement->execute();

            if($statement->rowCount() > 0)
            {
                return true;
            }
        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    // Logout
    public function logout($sess)
    {
        session_destroy();
        unset($sess);
        return true;
    }

    // Is logged in
    public function isLoggedin()
    {
        if(isset($_SESSION['user']))
        {
            return true;
        }
    }

    // Location
    public function redirect($url)
    {
        header("Location: " . $url);
    }
}
?>