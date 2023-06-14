<?php
include('config.php');
session_start();


if ($_POST['action'] == 'register') {

    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $password = $_POST['password'];
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO `users`(`first_name`, `last_name`, `username`, `address`, `email`, `password`, `city`, `state`, `zip`)
     VALUES ('{$firstName}', '{$lastName}','{$username}','{$address}','{$useremail}','{$hashPassword}','{$city}','{$state}','{$zip}')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location:../view/index.php');
    }
}

if ($_POST['action'] == 'update') {

    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $user_id = $_POST['user_id'];


    $sql = "UPDATE `users` SET `first_name`='{$firstName}', `last_name`='{$lastName}', `username`='{$username}', `address`='{$address}', `email`='{$useremail}', `city`='{$city}', `state`='{$state}', `zip`='{$zip}' WHERE user_id={$user_id} ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location:../view/admin.php');
    }
}

if ($_POST['action'] == 'login') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users where username='{$username}'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        echo '<pre>';

        if (password_verify($password, $data['password'])) {
            $_SESSION['login_err'] = '';
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['name'] = $data['first_name'] . " " . $data['last_name'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['admin'] = $data['admin'];
            $_SESSION['isActive'] = $data['isActive'];
            header('Location:../view/dashboard.php');
        } else {
            $_SESSION['login_err'] = "Password is not matching";
            header('Location:../view/index.php');
        }
    } else {
        $_SESSION['login_err'] = "Username does not exist";
        header('Location:../view/index.php');
    }
}

if ($_POST['action'] == 'apply_loan') {
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $timeperiod = mysqli_real_escape_string($conn, $_POST['timeperiod']);
    $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);

    $query = "INSERT INTO loan(`user_id`,`amount`,`timeperiod`, `status`) VALUES('{$user_id}', '{$amount}', '{$timeperiod}', 1)";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location:../view/apply.php');
    }

}
?>