<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <form id="loginform">

        <h3 id="logo">Log In</h3>

        <label for="username">Username</label>
        <input type="text" id="logemail" name="logemail" placeholder="Type in your email.." autocomplete="off" required />

        <label for="password">Password</label>
        <input type="password" id="logpassword" name="logpassword" placeholder="Enter your password.." autocomplete="off" required />

        <!-- <a class="forgot" href="#">Forgot Password?</a> -->
        <a class="register" href="#">Register</a>

        <input type="submit" id="login" name="login" value="Log In" />

    </form>

    <script>
        const submit = document.getElementById("login");

        async function logggin() {

            const form = document.getElementById("loginform");
            const formdata = new FormData(form);

            const check = await fetch("../implement/login.php", {
                method: "POST",
                headers: new Headers,
                body: formdata
            });
            const res = await check.json();
            if(res.status) {
                window.location = "register.php";
                alert(res.message);
            }else {

                alert(res.message);
            }
        }

        submit.addEventListener("click", e => {
            e.preventDefault();
            logggin()
        });
    </script>
</body>

</html>