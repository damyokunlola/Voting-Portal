<?php
require_once("../controller/user_controller.php");

$cand = new UserController();


$fullname = $_POST["fullname"];
$can_id = $_POST["can_id"];
$age = $_POST["age"];
$position = $_POST["position"];
$party = $_POST["party"];

$addcand = $cand->addCandidate("fullname,can_id,age,position,party", "'$fullname','$can_id','$age','$position','$party'");
if ($addcand) {
    $output["status"] = true;
    $output["message"] = "record added";
    //echo "Record added";
} else {
    echo "Record not added";
    $output["status"] = false;
    // $output["message"] = "record not added";
}
