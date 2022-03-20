<?php

require_once("config.php");
$username = $_POST['username'];
$email =  $_POST['email'];
$psw =  $_POST['password'];






$query = 'INSERT INTO User(username,email,password) VALUES (?,?,?)';
$verify = 'SELECT * FROM User WHERE (User.username = ?) AND (User.email = ?)';

$ver = $con->prepare($verify);
$ver->bind_param('ss',$username,$email); //Replace the ? with the value the value the user provided
$ver->execute();
$ver->store_result();

if($ver->num_rows !== 0) { //Checking is the user already exist
    echo '<h3 style="color:#ff0000;">Cette utilisateur existe déjà !</h3><br>';
}else {
    $ver->close(); //We close the previous request
    $prep = $con->prepare($query);
    $prep->bind_param('sss', $username, $email, $psw);
    $prep->execute();
}