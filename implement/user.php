<?php 
require_once("../controller/user_controller.php");
 
$user = new UserController();

    $errors = [];
    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $pollingunit = $_POST["polling_unit"];
    $phonenumber = $_POST["phonenumber"];

    if(empty($first_name)) $errors[] = "First name is required";
    if(empty($last_name)) $errors[]= "Last name is required";
    if(empty($age)) $errors[] = "age is required";
    if(empty($email)) $errors[]= "email is required";
    if(empty($pollingunit)) $errors[] = "Polling unit is required";
    if(empty($phonenumber)) $errors[]= "Phone number is required";
    if(count($errors) > 0) {
        $output["status"]= false;
        $output["message"] = implode(",", $errors);
        exit(json_encode($output));
    }
    
    $adduser= $user->addUser("firstname,lastname,age,email,phoneNo,polling_unit","'$first_name','$last_name','$age','$email','$phonenumber','$pollingunit'");
    if(!$adduser){
        $output["status"]= false;
        $output["message"]= "unable to add record";
    
    }
    
    else{
        $output["status"]= true;
        $output["message"]= "Record added";
    }
    
    echo json_encode($output);

?>

