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
}
?>