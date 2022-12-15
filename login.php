<html>
    <head>
        <title>User Login Form</title>
    </head>
    <body style="background-color: bisque">
        <?php
        if(isset($_POST['loggingOut'])) {
            echo "You have been logged out";
        }
        ?>
        <form method="post" action="pkmnUserLogin.php">
            <fieldset> <legend><h3> Login Form </h3></legend>
                <p><strong>Username:</strong><br/>
                    <input type="text" name="username"/></p>
                <p><strong>Password:</strong><br/>
                    <input type="password" name="password"/></p>
                <p><input type="submit" name="submit" value="login"/></p>
            </fieldset>
        </form>
        <a href="applyaccount.php">Create Account</a>
    </body>
</html>


