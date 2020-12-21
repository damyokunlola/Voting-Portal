<?php 
require_once("../controller/user_controller.php");
 
$user = new UserController();
    $Efname="";
    $errors = [];
    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $pollingunit = $_POST["polling_unit"];
    $phonenumber = $_POST["phonenumber"];
    $password= $_POST["pwd"];
    $Cpassword = $_POST["Cpwd"];
    $pwd_salt="";
    
   

    if(empty($first_name)) $errors[] = "First name is required";
    if(empty($last_name)) $errors[] = "Last name is required";
    if(empty($age)) $errors[] = "age is required";
    if(empty($email)) $errors[]= "email is required";
    if(empty($pollingunit)) $errors[] = "Polling unit is required";
    if(empty($phonenumber)) $errors[]= "Phone number is required";
    if(empty($password)) $errors[] = "Password is required";
    if(empty($Cpassword)) $errors[]= "Comfirm Password is required";
    if(count($errors) > 0) {
        $output["status"]= false;
        $output["message"] = implode(",", $errors);
        exit(json_encode($output));
    }
    


    $value=['cost' => 8];

    $encry_pwd= password_hash($password,PASSWORD_BCRYPT, $value);


// if(password_verify($password,$Cpassword)){

//     $output["message"]= "password and confirm password not match";
//     exit(json_encode($output));
// }



    $emailcount= $user->checkemail($email);
    
    if($emailcount>0){
    // $output["status"]= false;
    $output["message"] = "Email already exist.";
    exit(json_encode($output));


}

else{
    $adduser= $user->addUser("firstname,lastname,age,email,phoneNo,polling_unit,pwd,pwd_salt",
              "'$first_name','$last_name','$age','$email','$phonenumber','$pollingunit','$encry_pwd','$pwd_salt'");
    if(!$adduser){
        $output["status"]= false;
        $output["message"]= "unable to add record";
    
    }
    
    else{
        $output["status"]= true;
        $output["message"]= "Record added";
    }
    
    echo json_encode($output);

}


?>

