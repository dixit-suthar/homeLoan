<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == null) {

          header('Location:index.php');
}
if($_SESSION['admin'] == 1 && isset($_SESSION['user_id'])){
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
        <h2>Welcome
            <?php echo $_SESSION['name']; ?>
        </h2>
        <div class="row justify-content-left">
            <div class="col-3 p-2 ">
                <?php include('./sidebar.php'); ?>
                <div class="col-9">
                    <div class="row">
                        <div class="col-6">
                            <form onsubmit="calculate(); event.preventDefault()">
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Enter Loan Amount: (&#8377;)</label>
                                    <input type="number" class="form-control" id="amount"
                                        placeholder="Enter Loan amount" required>
                                </div>
                                <div class="mb-3">
                                    <label for="interest" class="form-label">Intrest rate: (%)</label>
                                    <input type="number" placeholder="Enter Rate of Interest per year"
                                        class="form-control" id="interest" required>
                                </div>
                                <div class="mb-3">
                                    <label for="duration" class="form-label">Loan Duration: (months)</label>
                                    <input type="number" class="form-control"
                                        placeholder="Enter Loan Duration in Months" id="duration" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Calculate</button>
                            </form>
                        </div>
                        <div class="col-6 d-none" id="output">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <h4>Monthly Interest:</h4>
                                </div>
                                <div class="col-6">
                                    <h4 id="monthly-interest"></h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <h4>Monthly Payment:</h4>
                                </div>
                                <div class="col-6">
                                <h4 id="monthly-payment"></h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <h4>Total Interest Cost:</h4>
                                </div>
                                <div class="col-6">
                                <h4 id="total-repayment"></h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <h4>Monthly Interest:</h4>
                                </div>
                                <div class="col-6">
                                    <h4 id="total-interest"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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