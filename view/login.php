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

        <form id="coringform">

            <h3 id="logo">Vote for your choice</h3>

            <label for="co"/label>
            <input type="text" placeholder="voting candidas" required />

            <label for="password">Password</label>
            <input type="password" id="logpassword" name="logpassword" placeholder="Enter your password.." autocomplete="off" required />


            <button type="submit" id="submit" name="login">ot</button>
          
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

         const submit = document.getElementById("submit");

        asyn function addcan (){
            
        }
    </script>
</body>

</html>