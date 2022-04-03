<?php

class Currentuser{

    private $loggedIn = false;
    private $loginAttempted = false;


    public function __construct(&$SQLcon)
    {
        //Checking if we received data
        if(isset($_POST["username"]) and isset($_POST["password"]) and session_status() === PHP_SESSION_NONE){
            $username = $_POST['username'];
            $psw = $_POST['password'];
            //query to check if the user exist
            $query = 'SELECT * FROM User WHERE (User.username = ?)';

            $ver = $SQLcon->getConn()->prepare($query);
            $ver->bind_param('s', $username); //Replace the ? with the value the user provided
            $ver->execute();
            $ver->store_result();
            $this->loginAttempted = true;
            session_set_cookie_params(0);
            session_start();
            if ($ver->num_rows > 0) { //Checking if the user exist in the db
                $ver->bind_result($_SESSION['Username'],$_SESSION['Email'],$hash);
                $ver->fetch();
                if (password_verify($psw,$hash)) {//if so we check the psd
                    $this->loggedIn = TRUE; //User is connected
                    echo "login success";
                    header("Location: ../index.php",true,301);
                } else {
                    echo "Wrong password";
                }
            } else {
                echo '<h3 style="color:#ff0000;">Username inconnu !</h3><br>';
            }
            $ver->close(); //We close the connection to the db
        }
    }

    /**
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return $this->loggedIn;
    }

    /**
     * @return bool
     */
    public function isLoginAttempted(): bool
    {
        return $this->loginAttempted;
    }

}