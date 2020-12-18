

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <form method="post" action="">

        <h3 id="logo">Log In</h3>

        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Type in your username.." autocomplete="off" required />

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password.." autocomplete="off" required />

        <!-- <a class="forgot" href="#">Forgot Password?</a> -->
        <a class="register" href="#">Register</a>

        <input type="submit" name="submit" value="Log In" />

    </form>

    <script type="text/javascript" src="myJs.php"></script>
</body>
</html>