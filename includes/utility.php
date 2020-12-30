<?php

function successalert($message)
{

    $output["status"] = true;
    $output["message"] = $message;
    return $output;
}


function failalert($message)
{

    $output["status"] = false;
    $output["message"] = $message;
    return $output;
}
