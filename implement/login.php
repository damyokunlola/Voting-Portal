<?php 
require_once("../controller/user_controller.php");
 
$user = new UserController();

$logEmail=$_POST["logemail"];
$logPwd=$_POST["logpassword"];


$loguser= $user->loginUser($logEmail,$logPwd);  

if($loguser != null) {

    if(password_verify($logPwd, $loguser["pwd"])) {

        session_start();
        $_SESSION["userid"] = $loguser["id"];
     
        $output["status"]= true;
        $output["message"]= "correct username or password";
        header("location: ../view/register.php",TRUE,301);
       
    } else {
        $output["status"]= false;
        $output["message"]= "incorrect username or password";
    }
  

} else {
    $output["status"]= false;
    $output["message"]= "incorrect username or password";
}
echo json_encode($output); 
