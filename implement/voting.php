<?php

require_once("../controller/user_controller.php");
include "../includes/utility.php";
$user = new UserController();




$p_vote = $_POST["p_vote"];

//$g_vote = $_POST["g_vote"];
$userid = isset($_SESSION["id"]);
$addpvote = $user->vote("user_id,can_id", "'$userid','$p_vote'");
//$addgvote = $user->vote("user_id,can_id", "'$userid','$g_vote'");
if ($addpvote) {
    exit(json_encode(successalert("Vote successfully saved")));
} else {

    exit(json_encode(failalert("Invalid Vote")));
    echo json_encode("failed");
}

