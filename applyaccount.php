<?php
$hideForm = false;
$address = "69.172.204.200";
$username = "bagelmancer";
$password = "Aanth_web_2022";
$dbname = "AJAXdb";

if ((isset($_POST["username"])) && (isset($_POST["password"]))) {
    if ((!filter_input(INPUT_POST, 'username')) || (!filter_input(INPUT_POST, 'password'))) {
        echo "Must fill out all fields!";
    } else {
        $mysqli = mysqli_connect($address, $username, $password, $dbname);
        $targetUsername = filter_input(INPUT_POST, 'username');
        $targetPassword = SHA1(filter_input(INPUT_POST, 'password'));
        $sql = "INSERT INTO auth_users VALUES('" . $targetUsername . "', '" . $targetPassword . "')";
        $sql2 = "SELECT username FROM auth_users WHERE username = '" . $targetUsername . "'";
        $result = mysqli_query($mysqli, $sql2) or die(mysqli_error($mysqli));

        if (mysqli_num_rows($result) > 0) {
            //$_POST["checkEmail"] = "used";
            echo "Username already in use. Try again!";
        } else {
            mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
            echo "Account created successfully!<br />";
            echo "<a href='login.php'>Go to Login</a>";
            echo "<br />";
            $target_path = "/var/www/html/uploaddir/" . $targetUsername . "/";
            //echo $target_path;            
            mkdir($target_path, 0733);
            $hideForm = true;
        }
    }
}
?>

<html>
    <head>
        <link rel="stylesheet" href="PokeStyle.css">
        <title>Create Account</title>
    </head>
    <body>
        <?php
        if ($hideForm == false) {
            ?>
            <form name="apply" method="post" action="">
                <fieldset> <legend><h3> Create Account Form </h3></legend>
                    <p><strong>Username: </strong><br/>
                        <input type="text" name="username" placeholder="No special characters" pattern="^[A-Za-z\s]{1,50}$" maxlength="50"required></p>                   
                    <p><strong>Password</strong><br/>
                        <input type="password" name="password" required></p>
                    <p><input type="submit" name="submit" value="Create Account"/></p>
                </fieldset>
            </form>
            <div id="logout" style="align-content: end">
                <form action="login.php">
                    <input type="submit" value="Go Back" name="back">
                </form>
            </div>
        </body>
    </html>
    <?php
}
?>