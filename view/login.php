<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <title>Voting Page</title>
</head>

<body>
    <div class="container">

        <form id="loginform">

            <h3 id="logo">Login </h3>

            <label for="co">Email</label>
            <input type="text" name="logemail" placeholder="Enter your email address" required />

            <label for="password">Password</label>
            <input type="password" id="logpassword" name="logpassword" placeholder="Enter your password.." autocomplete="off" required />

            <div>
                <p>Dont have an account yet ? click <a href="register.php">here</a> to register</p>
            </div>

            <button type="submit" id="submitbtn" name="login">Login</button>

        </form>
    </div>

    <script>
        const submit = document.getElementById("submitbtn");

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