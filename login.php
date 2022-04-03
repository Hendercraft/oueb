<?php
require_once("./initialise.php");
//TODO Refactor with a fucking con class so it's less disgusting
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
<?php
if (!$SQLcon->getCurrentuser()->isLoggedIn()){
    echo '<div class="login">
    <h1>Login</h1>
    <form action="login.php" method="post">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="username" placeholder="Username" id="username" required>
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <input type="submit" value="Login">
    </form>
</div>';
}else{ //if the user is connected
    echo'You seem to be already connected';
}
?>

</body>
</html>



