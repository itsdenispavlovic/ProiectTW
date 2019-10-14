<?php
class User
{
    function __construct($conn)
    {
        $this->db = $conn;
    }

    // Creating account
    public function createAccount($username, $fname, $lname, $password)
    {
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
            try
            {
                $regStatement = $this->db->prepare('INSERT INTO users (username, fname, lname, password) VALUES (:username, :fname, :lname, :password)');
                //HASHED PASSWORD
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $regStatement->execute(array(
                    ':username' => $username,
                    ':fname' => $fname,
                    ':lname' => $lname,
                    ':password' => $hashedPassword
                ));

                return true;

                // If reg is successfully, generam un cod random pentru activarea contului TODO
            } catch(PDOException $e)
            {
                echo $e->getMessage();
            }
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