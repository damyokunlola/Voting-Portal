<?php
require_once("../controller/user_controller.php");
include "../includes/utility.php";


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
    exit(json_encode($output));

    // echo json_encode(successalert("Record added"));
} else {

    $output["status"] = false;
    $output["message"] = "not added";
    exit(json_encode($output));

    // echo json_encode(failalert("Record not added"));
}
