<?php
session_start();
require_once("../controller/user_controller.php");
include "../includes/utility.php";
$user = new UserController();




$p_vote = $_POST["p_vote"];
$userid = $_SESSION["userid"];

$g_vote = $_POST["g_vote"];


$checkuser = $user->checkvoter($userid);

if ($checkuser > 0) {

    exit(json_encode(failalert("You can not vote multiple times")));
}

$addpvote = $user->vote("user_id,can_id,election_type", "'$userid','$p_vote','Presidential'");
$addgvote = $user->vote("user_id,can_id,election_type", "'$userid','$g_vote','Governorship'");

if ($addpvote && $addgvote) {

    exit(json_encode(successalert("Vote successfully saved")));
} else {

    exit(json_encode(failalert("Invalid Vote")));
}
