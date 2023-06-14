<?php
include('../php/config.php');
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == null) {
    header('Location:./index.php');
}
if ($_SESSION['admin'] == 0) {
    header('Location:./dashboard.php');
}

$query = "SELECT user_id,username, first_name, last_name, email, state FROM users WHERE admin = 0";
$result = mysqli_query($conn, $query);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Loan</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include('./navbar.php'); ?>
    <div class="container mt-2">
        <h2>Welcome
            <?php echo $_SESSION['name']; ?>
        </h2>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">User Id</th>
                            <th scope="col">Username</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">State</th>
                            <th scope="col">Actions</th>
                        </tr>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $data['user_id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $data['username'] ?>
                                    </td>
                                    <td>
                                        <?php echo $data['first_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $data['last_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $data['email'] ?>
                                    </td>
                                    <td>
                                        <?php echo $data['state'] ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">

                                            <button type="button" class="btn p-0">
                                                <a class="text-decoration-none" href="admin_edit.php?id=<?php echo $data['user_id']; ?>">
                                                    <i class="fa-solid fa-pen-to-square text-success"></i>
                                                </a>
                                            </button>
                                            <button type="button" class="btn">
                                                <a class="text-decoration-none" href="admin_del.php?id=<?php echo $data['user_id'];?>">
                                                    <i class="fa-solid fa-trash text-danger"></i>
                                                </a>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
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