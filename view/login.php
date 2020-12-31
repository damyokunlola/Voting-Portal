<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <title>Login Page</title>
</head>

<body>
    <div class="container">

        <form id="loginform">

            <h3 id="logo">Log In</h3>

            <label for="username">Username</label>
            <input type="text" id="logemail" name="logemail" placeholder="Type in your email.." autocomplete="off" required />

            <label for="password">Password</label>
            <input type="password" id="logpassword" name="logpassword" placeholder="Enter your password.." autocomplete="off" required />


            <button type="submit" id="login" name="login">Login</button>
            <div>
                <p>Dont have an account ? click <a href="register.php">here</a> to register</p>
            </div>
        </form>
    </div>

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
            if (res.status) {
                window.location = "dashboard.php";
                alert(res.message);
            } else {

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