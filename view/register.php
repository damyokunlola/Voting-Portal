
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
    <fieldset>
      <input placeholder="First name" type="text" id="firstname" name="firstname" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Last name" type="text" id="lastname" name="lastname"  required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Age" type="number" id="age" name="age" tabindex="2" required>
    </fieldset>
    
    <fieldset>
      <input placeholder="Polling unit" type="text" id="polling_unit" name="polling_unit" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number" type="tel"  id="phonenumber" name="phonenumber"  required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="email" id="email" name="email" >
    </fieldset>

    <fieldset>
      <button name="submit" type="submit" id="submit" d>Submit</button>
    </fieldset>

  </form>


<script> 

const $submit = document.getElementById("submit");

async function addRecord(){
   const form= document.getElementById("register");
   const formdata= new FormData(form);
   const res= await fetch("../implement/user.php", { method :"POST", headers: new Headers(),body : formdata});
   const result= await res.json();
   alert(result.message);
}

submit.addEventListener("click",e => {
   e.preventDefault(); 
  addRecord();

});

</script>
</div>
</body>
</html>