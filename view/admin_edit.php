<?php
include('../php/config.php');

$query = "SELECT * FROM users WHERE user_id={$_GET['id']}";
$result = mysqli_fetch_assoc(mysqli_query($conn,$query));

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location:./index.php');
}

$query = "SELECT * FROM states";
$res = mysqli_query($conn, $query);
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
  <div class="container-flex d-flex w-100 bg-main justify-content-center align-items-center pt-0">
    <div class="form-wrapper shadow-lg w-50 bg-white px-5 mt-5 border border-secondary rounded">
      <div class="d-flex justify-content-center">
        <img src="./img/logo.png" class="w-25 border border-0 mb-3" alt="">
      </div>
      <form id="registrationForm" action="../php/controller.php" method="post" class="row g-3">
        <div class="col-6">
          <label for="email" class="form-label">First Name</label>
          <input type="text" placeholder="First Name" name="firstName" class="form-control" id="firstName"  value="<?php echo $result['first_name'] ?>">
        </div>
        <div class="col-6 ">
          <label for="password" class="form-label">Last Name</label>
          <input type="text" placeholder="Last Name" name="lastName" class="form-control" id="lastName" value="<?php echo $result['last_name'] ?>">
        </div>
        <div class="col-12">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $result['username'] ?>">
        </div>
        <div class="col-12">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" value="<?php echo $result['address'] ?>">
        </div>
        <div class="col-12">
          <label for="useremail" class="form-label">Email</label>
          <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Email" value="<?php echo $result['email'] ?>">
        </div>
        <div class="col-md-6">
          <label for="city" class="form-label">City</label>
          <input type="text" placeholder="City" name="city" class="form-control" id="city" value="<?php echo $result['city'] ?>">
        </div>
        <div class="col-md-4">
          <label for="state" class="form-label">State</label>
          <select id="state" name="state" class="form-select">
            <?php
            while ($data = mysqli_fetch_assoc($res)) {
                if($result['state'] == $data['name']){
                    ?>
              <option value="<?php echo $data['name'] ?>" id="<?php echo $data['id'] ?>" selected> <?php echo $data['name'] ?>
                    <?php
                }
                else{
              ?>
              <option value="<?php echo $data['name'] ?>" id="<?php echo $data['id'] ?>"> <?php echo $data['name'] ?>
              </option>
              <?php
                }
            }
            ?>
          </select>
        </div>
        <div class="col-md-2">
          <label for="zip" class="form-label">Zip</label>
          <input type="text" placeholder="Zip" name="zip" class="form-control" id="zip" value="<?php echo $result['zip'] ?>">
        </div>
        <div class="col-12">
          <input type="hidden" name="action" value="update">
          <input type="hidden" name="user_id" value="<?= $_GET['id']; ?>">
          <button type="submit" onclick="validate()" class="btn btn-primary w-100 shadow-lg mb-3">Update</button>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="./js/validator.js"></script>
</body>

</html>