<?php
session_start();
if ($_SESSION["userid"] == null || !isset($_SESSION["userid"])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <div id="navigation-bar" class="d-flex justify-content-between p-1 bg-dark shadow">
        <a class="navbar-brand text-white" href="#">Polling App</a> <i id="togglebtn" class="d-block d-md-none fa fa-bars p-1 text-white bg-dark"></i>
        <div class="d-flex">
            <h6 class="m-1 text-white p-2"><?= $_SESSION["name"] ?></h6>
            <a class="btn btn-sm btn-outline-danger m-1" href="logout.php">Logout</a>
        </div>
    </div>

    <div id="main">
        <div id="sidebar" class="bg-dark">
            <li><a href="voting.php">Voting portal</a></li>
        </div>
        <div id="content" class="bg-light"></div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>