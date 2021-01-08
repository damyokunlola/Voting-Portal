<?php
require_once("../controller/user_controller.php");
include "../includes/utility.php";

$user = new UserController();
$Efname = "";
$errors = [];
$first_name = $_POST["firstname"];
$last_name = $_POST["lastname"];
$age = $_POST["age"];
$email = $_POST["email"];
$type = $_POST["type"];
$position = $_POST["position"];
$phonenumber = $_POST["phonenumber"];
$password = $_POST["pwd"];
$Cpassword = $_POST["Cpwd"];

if ($type === "voter") {
    $position = "None";
}

if (empty($first_name)) $errors[] = "First name is required";
if (empty($last_name)) $errors[] = "Last name is required";
if (empty($age)) $errors[] = "age is required";
if (empty($email)) $errors[] = "email is required";

if (empty($phonenumber)) $errors[] = "Phone number is required";
if (empty($password)) $errors[] = "Password is required";
if (empty($Cpassword)) $errors[] = "Comfirm Password is required";
if (count($errors) > 0) {
    $output["status"] = false;
    $output["message"] = implode(",", $errors);
    exit(json_encode($output));
}



$value = ['cost' => 8];

$encry_pwd = password_hash($password, PASSWORD_BCRYPT, $value);


$emailcount = $user->checkemail($email);

if ($emailcount > 0) {
    // $output["status"] = false;
    // $output["message"] = "Email already exist.";
    // exit(json_encode($output));


    exit(json_encode(failalert("Email already exist")));
}
if ($age < 18) {
    exit(json_encode(failalert("you are below age")));
}

$adduser = $user->addUser(
    "`firstname`, `lastname`, `age`, `email`, `phonenumber`, `pwd`, `type`, `position`",
    "'$first_name','$last_name','$age','$email','$phonenumber','$encry_pwd','$type','$position'"
);
if (!$adduser) {
    echo json_encode(failalert("Record not  added"));
} else {     
    // $output["status"] = true;
    // $output["message"] = "Record added";
    echo json_encode(successalert("Record added"));
}

    //echo json_encode($output);
