<?php

require_once("../controller/user_controller.php");

$user = new UserController();
$count = 0;
$candidate_id = $_POST["candidateid"];
$userid = $_SESSION["userid"];
$addvote = $user->vote("user_id,can_id", "'$userid','$candidate_id'");


$query = "SELECT COUNT(*) FROM votes WHERE can_id = $candidate_id";



if ($addvote) {



    $output["status"] = true;
    $output["message"] = "You have successfully cast your vote";
} else {

    $output["status"] = false;
    $output["message"] = "Invalid vote";
}

echo json_encode($output);
