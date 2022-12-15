<?php
session_start();

//check for required fields from the form
if ((!filter_input(INPUT_POST, 'username')) || (!filter_input(INPUT_POST, 'password'))) {
//if ((!isset($_POST["username"])) || (!isset($_POST["password"]))) {
    header("Location: login.php");
    exit;
}

$mysqli = mysqli_connect("localhost", "cs213user", "letmein", "Pokelex");
$targetusername = filter_input(INPUT_POST, 'username');
$targetpasswd = filter_input(INPUT_POST, 'password');
$sql = "SELECT username FROM auth_users WHERE username = '" . $targetusername . "' AND password = SHA1('" . $targetpasswd . "')";
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

//get the number of rows in the result set; should be 1 if a match
if (mysqli_num_rows($result) >= 1) {

//if authorized, get the values of f_name l_name
    while ($info = mysqli_fetch_array($result)) {
        $f_name = stripslashes($info['username']);
    }

//set authorization cookie using curent Session ID
    setcookie("auth", session_id(), time() + 60 * 30, "/", "", 0);
} else {
//redirect back to login form if not authorized
    header("Location: login.php");
    exit;
}
?>
<html>
    <head>
        <link rel="stylesheet" href="PokeStyle.css">
        <title>User Login</title>
    </head>
    <body>
        <?php
        echo "<h1>Welcome " . $f_name . "</h1>";
        ?>
        <p>Select to find your favorite Pokemon!</p>
        <form method="post" action="PokeForm.php">
            <fieldset> <legend><h3> Pokedex Suggestions </h3></legend>
                <input type="submit" value="Go to Pokedex" name="submit">
            </fieldset>
        </form>
        <div id="logout" style="align-content: end">
            <form action="login.php" method="POST">
                <input type="submit" value="Log Out" name="logout">
                <input type="hidden" name="loggingOut">
            </form>
        </div>
    </body>
</html>
