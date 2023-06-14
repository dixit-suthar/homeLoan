<?php
include('../php/config.php');
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == null) {
    header('Location:index.php');
}
if ($_SESSION['admin'] == 1 && isset($_SESSION['user_id'])) {
    header('Location:./admin.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Loan</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include('./navbar.php'); ?>
    <div class="container mt-4 h-50">
        <h2 class="mb-2">Welcome
            <?php echo $_SESSION['name']; ?>
        </h2>
        <div class="row justify-content-left">
            <div class="col-3 p-2 ">
                <?php include('./sidebar.php'); ?>
                <div class="col-9">

                    <?php
                    $query = "SELECT status from loan INNER JOIN users on users.user_id = loan.user_id where loan.user_id = {$_SESSION['user_id']}";
                    $result = mysqli_query($conn, $query);
                    $status = mysqli_fetch_assoc($result);

                    if (!empty($status['status'])) {
                        if ($status['status'] == 1) {
                            ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-warning">
                                        Loan Applied waiting for the admin response
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">

                                <div class="col-4">
                                    <img src="./img/success.jpg" width="200px" height="400px" alt="">

                                </div>
                            </div>

                            <?php
                        } else if ($status['status'] == 2) {
                            ?>
                                <div class="alert alert-success">
                                    Loan approved successfully
                                </div>
                            <?php
                        }
                    } else {
                        ?>

                        <form class="row" method="post" action="../php/controller.php">
                            <div class="col-md-6 mb-3">
                                <label for="Amount" class="form-label">Amount (in &#8377;) :</label>
                                <input type="number" class="form-control" id="amount" name="amount"
                                    placeholder="Enter Loan Amount" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="timeperiod" class="form-label">Time Period (in years) :</label>
                                <input type="number" class="form-control" id="timeperiod" name="timeperiod"
                                    placeholder="Enter timeperiod" required>
                            </div>

                            <div class="col-md-12">
                                <input type="hidden" name="action" value="apply_loan">
                                <button type="submit" class="btn btn-primary">Apply for Loan</button>
                            </div>
                        </form>

                        <?php

                    }

                    ?>
                </div>
            </div>
        </div>

        <?php include('./footer.php'); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
            integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
            integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="./js/validator.js"></script>
        <script src="./js/emi.js"></script>
</body>

</html>