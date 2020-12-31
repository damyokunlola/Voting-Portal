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
        <input placeholder="Your Phone Number" type="tel" id="phonenumber" name="phonenumber" required>
      </div>
      <div>
        <input placeholder="Your Email Address" type="email" id="email" name="email">
      </div>

      <div>
        <select id="type" name="type" required>
          <option value="voter">voter</option>
          <option value="candidate">candidate</option>
        </select>
      </div>
      <div id="posdiv" class="hide">
        <select id="position" name="position" required>
          <option value="None" selected>None</option>
          <option value="Governorship">Governorship</option>
          <option value="Presidency">Presidency</option>
          <option value="Chairman">Chairman</option>
          <option value="Senator">Senator</option>
        </select>
      </div>
      <div>
        <input placeholder="Password" type="password" id="pwd" name="pwd">
      </div>
      <div>
        <input placeholder="Comfirm Password" type="password" id="Cpwd" name="Cpwd">
        <span class="danger" id="message"></span>
      </div>
      <div>
        <p>Already have an account ? click <a href="login.php">here</a> to login</p>
      </div>
      <div>
        <button name="submit" type="submit" id="submit">Submit</button>
      </div>

    </form>
  </div>

  <script>
    document.getElementById("Cpwd").addEventListener("keyup", comparePwd);

    document.getElementById("type").addEventListener("change", e => {
      if (e.target.value === "candidate") {
        document.getElementById("posdiv").classList.remove("hide");
      } else {
        document.getElementById("posdiv").classList.add("hide");
      }
    })

    function comparePwd() {

      var pwd = document.getElementById("pwd");
      var Cpwd = document.getElementById("Cpwd");
      if (pwd.value != Cpwd.value) {
        document.getElementById('message').innerHTML = "password and confirm password not match";

      } else {
        document.getElementById('message').innerHTML = "";
      }
    }

    function validateInput() {
      let errors = 0;
      let errormsg = "";
      const type = document.getElementById("type");
      const position = document.getElementById("position");
      const pwd = document.getElementById("pwd");
      const Cpwd = document.getElementById("Cpwd");

      if (pwd.value !== Cpwd.value) {
        errors++;
        errormsg += "password does not match <br/>";
      }

      if (type.value == "candidate" && position.value == "None") {
        errors++;
        errormsg += "candidate position can not be none <br/>";
      }

      if (errors > 0) {
        document.getElementById("message").innerHTML = errormsg;
        return false;
      } else {
        document.getElementById("message").innerHTML = "";

        return true;
      }
    }

    document.getElementById("Cpwd").addEventListener("keyup", comparePwd);
    const submit = document.getElementById("submit");

    async function addRecord() {
      if (!validateInput()) return;
      const form = document.getElementById("register");
      const formdata = new FormData(form);
      const res = await fetch("../implement/user.php", {
        method: "POST",
        headers: new Headers(),
        body: formdata
      });
      const result = await res.json();
      if (result.status) {
        window.location = "login.php";
      } else {
        alert(result.message);
      }
    }

    submit.addEventListener("click", e => {
      e.preventDefault();
      addRecord();

    });
  </script>


</body>

</html>