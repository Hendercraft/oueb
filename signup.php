<?php
require_once("initialise.php");
if (isset($_POST['Singup_username']) && isset($_POST['Singup_email']) && isset($_POST['Singup_password'])){
    $verify = 'SELECT * FROM User WHERE (User.username = ?)';
    $username = $_POST['Singup_username'];
    $email = $_POST['Singup_email'];
    $psw = $_POST['Singup_password'];
    //$con is defined in config.php if your ide freaks out ignore it
    $ver = $SQLcon->getConn()->prepare($verify);
    $ver->bind_param('s',$username); //Replace the ? with the value the value the user provided
    $ver->execute();
    $ver->store_result();

    if($ver->num_rows !== 0) { //Checking is the user already exist
        echo '<h3 style="color:#ff0000;">Cette utilisateur existe déjà !</h3><br>';
    }else {
        $ver->close(); //We close the previous request
        $hash= password_hash($psw,PASSWORD_DEFAULT); //hashing the password
        $query = 'INSERT INTO User(username,email,password) VALUES (?,?,?)';
        $prep = $SQLcon->getConn()->prepare($query);
        $prep->bind_param('sss', $username, $email, $hash);
        $prep->execute();
        $prep->close();
        /* Connection the user now that he singed up */
        $_POST['username'] = $username;
        $_POST['password'] = $psw;
        $SQLcon->setCurrentuser(new Currentuser($SQLcon));
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="singup">
    <h1>Signup</h1>
    <form action="signup.php" method="post">

        <div class="signup">Signup</div>
        <label for="username">Username</label>
        <input type="text" name="Singup_username" placeholder="Username" id="Singup_username" required>
        <label for="Email">Email</label>
        <input type="email" name="Singup_email" placeholder="exemple@exemple.com" id="Singup_email" required>
        <label for="password">Password</label>
        <input type="password" name="Singup_password" placeholder="Password" id="Singup_password" required>
        <input type="submit" value="Signup">
    </form>
</div>
</body>
</html>


