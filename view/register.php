<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register page</title>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>

<body>

  <div class="container">
    <form id="register" name="register">
      <h3>Register Form</h3>
      <h4>Kindly fill all form</h4>
      <div>
        <input placeholder="First name" type="text" id="firstname" name="firstname" required autofocus>
        <span></span>
      </div>
      <div>
        <input placeholder="Last name" type="text" id="lastname" name="lastname" required autofocus>
      </div>
      <div>
        <input placeholder="Age" type="number" id="age" name="age" tabindex="2" required>
      </div>

      <div>
        <input placeholder="Polling unit" type="text" id="polling_unit" name="polling_unit" required>
      </div>
      <div>
        <input placeholder="Your Phone Number" type="tel" id="phonenumber" name="phonenumber" required>
      </div>
      <div>
        <input placeholder="Your Email Address" type="email" id="email" name="email">
      </div>
      <div>
        <input placeholder="Password" type="password" id="pwd" name="pwd">
      </div>
      <div>
        <input placeholder="Comfirm Password" type="password" id="Cpwd" name="Cpwd">
        <span class="danger" id="message"></span>
      </div>
      <div>
        <button name="submit" type="submit" id="submit">Submit</button>
      </div>

    </form>
  </div>

  <script>
    document.getElementById("Cpwd").addEventListener("keyup", comparePwd);

    function comparePwd() {

      var pwd = document.getElementById("pwd");
      var Cpwd = document.getElementById("Cpwd");
      if (pwd.value != Cpwd.value) {
        document.getElementById('message').innerHTML = "password and confirm password not match";

      } else {
        document.getElementById('message').innerHTML = "";
      }
    }

    document.getElementById("Cpwd").addEventListener("keyup", comparePwd);
    const $submit = document.getElementById("submit");

    async function addRecord() {
      const form = document.getElementById("register");
      const formdata = new FormData(form);
      const res = await fetch("../implement/user.php", {
        method: "POST",
        headers: new Headers(),
        body: formdata
      });
      const result = await res.json();
      alert(result.message);
    }

    submit.addEventListener("click", e => {
      e.preventDefault();
      addRecord();

    });
  </script>


</body>

</html>