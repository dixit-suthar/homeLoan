<?php
session_start();
if(isset($_SESSION['user_id'])){
  if($_SESSION['admin'] == 1 && isset($_SESSION['user_id'])){
    header('Location:./admin.php');
  }
  else{
    header('Location:dashboard.php');
  }
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
  <div class="container-flex d-flex w-100 bg-main justify-content-center align-items-center">
    <div class="form-wrapper shadow-lg w-50 bg-white p-5 border border-secondary rounded">
      <form method="post" action="../php/controller.php" id="loginForm">
        <div class="d-flex justify-content-center">
          <img src="./img/logo.png" class="w-50 border border-0 mb-3" alt="">
        </div>
  
        <?php
  if(isset($_SESSION['login_err']) && $_SESSION['login_err'] != ''){
?>
        <div class="alert alert-danger mr-5" role="alert">
      <?= $_SESSION['login_err'] ?>
      </div>
  <?php
  $_SESSION['login_err'] = '';
  }
?>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Username"
            aria-describedby="usernameHelp">
        </div>
        <div class="mb-5">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" id="password">
          <a class="form-text text-decoration-none text-primary float-end fw-bolder" href="#">Forget Password?</a>
        </div>
        <div class="d-flex justify-content-center mb-3">
          
          <input type="hidden" name="action" value="login">
          <button type="submit" onclick="validateLogin()" class="btn btn-primary w-100 shadow">Login</button>
        </div>
        <div class="d-flex justify-content-center">
          <a href="./registration.php" class="btn btn-warning w-100 shadow">Don't have account? Register now</a>
        </div>
      </form>
    </div>
  </div>
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