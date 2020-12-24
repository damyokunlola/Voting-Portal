<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container">

        <form id="candidate">
            <h3>Candidate Form</h3>
            <h4>Kindly fill all form</h4>

            <div>
                <input placeholder="Full name" type="text" id="fullname" name="fullname" required autofocus>
                <span></span>
            </div>
            <div>
                <input placeholder="Candidate Id" type="text" id="can_id" name="can_id" value="<?php echo rand(1, 1000000) . "CDT" ?>" disabled>
            </div>
            <div>
                <input placeholder="Age" type="number" id="age" name="age" tabindex="2" required>
            </div>

            <div>
                <input placeholder="Position" type="text" id="position" name="position" required>
            </div>
            <div>
                <input placeholder="Party" type="tel" id="party" name="party" required>
            </div>

            <div>
                <button name="submit" type="submit" id="submit">Submit</button>
            </div>

        </form>

        <?php $serial = rand(1, 1000000);
        echo $serial; ?>
    </div>

    <script>
        const submit = document.getElementById("submit");

        async function addCandidate() {

            const form = document.getElementById("candidate");
            const formdata = new FormData(form);
            const res = await fetch("../implement/candidate.php", {

                method: "POST",
                headers: new Headers,
                body: formdata
            });

            const result = await res.json();
            alert(result.message);
        }

        submit.addEventListener("click", e => {
            e.preventDefault(), addCandidate();
        });
    </script>




</body>

</html>