<?php
require_once("../controller/user_controller.php");
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
        
        <div id="content" class="bg-light">

            <div class="container">
                <form id="votingform">

                    <div class="container stats">


                        <h3 class="text-center"> Presidential Election </h3>
                        </br>
                        <div class="row ">


                            <?php $user = new UserController();
                            $getcandidate = $user->fetchcandidate("candidate", "Presidency");


                            foreach ($getcandidate as $can) {
                                $gettotal = $user->fetchresult($can["can_id"]);
                            ?>



                                <div class=" col-lg-4 col-md-4 col-sm-12 mb-2">
                                    <div class="card minicard border-bottom-primary">
                                        <div class="card-body">
                                            <h6 style="font-size: 14px;"><i class="fa fa-arrow-up bg-primary p-2 rounded-circle text-white" aria-hidden="true"></i> &nbsp; <span style="color: #949090;">Presidential Aspirant</span></h6>
                                            <h3 class="text-center" id="total-amount-invested"><?= $can["firstname"] . "  " . "(" . $gettotal . ")" ?></h3>
                                        </div>
                                    </div>



                                    <div>

                                        <input type="radio" id="p_vote" name="p_vote" value="<?= $can["can_id"]  ?>">
                                    </div>
                                </div>

                            <?php } ?>



                        </div>

                        </br></br> </br></br>



                        <h3 class="text-center"> Governorship Election </h3>
                        <div class="row -m-5">


                            <?php $user = new UserController();
                            $getcandidate = $user->fetchcandidate("candidate", "Governorship");


                            foreach ($getcandidate as $candidate) {
                                $gettotal = $user->fetchresult($candidate["can_id"]);

                            ?>

                                <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                                    <div class="card minicard border-bottom-primary">
                                        <div class="card-body">
                                            <h6 style="font-size: 14px;"><i class="fa fa-arrow-up bg-primary p-2 rounded-circle text-white" aria-hidden="true"></i> &nbsp; <span style="color: #949090;">Governorship Aspirant</span></h6>
                                            <h3 class="text-center" id="total-amount-invested"><?= $candidate["firstname"] . "  " . "(" . $gettotal . ")" ?></h3>
                                        </div>
                                    </div>


                                    <div>

                                        <input type="radio" id="g_vote" name="g_vote" value="<?= $candidate["can_id"] ?>">
                                    </div>

                                </div>

                            <?php } ?>



                            </br>
                            </br></br>


                        </div>
                        <button type="submit" id="submit_vote" name="submit_vote">Submit Vote</button>
                </form>

            </div>

        </div>

    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/dashboard.js"></script>



    <script>
        const submit = document.getElementById("submit_vote");

        async function savevote() {
            const form = document.getElementById("votingform");
            const formdata = new FormData(form);
            const res = await fetch("../implement/voting.php", {
                method: "POST",
                headers: new Headers(),
                body: formdata
            });
            const result = await res.json();

            alert(result.message);
        }

        submit.addEventListener("click",
            e => {
                e.preventDefault();
                savevote();
            });
    </script>
</body>

</html>