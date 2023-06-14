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
        <div class="col-6">
          <div class="mt-3">

            <div class="mb-3">
              <h3 class="text-center text-success">Your Credit Score is : 800</h3>
            </div>
            <div class="progress blue">
              <span class="progress-left">
                <span class="progress-bar"></span>
              </span>
              <span class="progress-right">
                <span class="progress-bar"></span>
              </span>
              <div class="progress-value">800</div>
            </div>

          </div>
        </div>
        <div class="col-3">
          <img src="./img/person.png" width="300px" height="500px" alt="">

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
</body>

</html>