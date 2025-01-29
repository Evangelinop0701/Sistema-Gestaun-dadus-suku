<?php
session_start();
error_reporting(0);
include "class/class.php";
include "class/lib.php";

$db = new database();
$user = new user();


if ($user->get_sessi()) {
    header('location: backend/');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Scrolling Nav - Start Bootstrap Template</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/local.css" rel="stylesheet" />
    <link href="assets/icon/all.css" rel="stylesheet" />
    <link href="assets/datatables/datatables.min.css" rel="stylesheet" />
</head>

<body id="page-top">
    <div class="container p-4 mt-5 p-5">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-md-4">
                    <div class="card rounded-1">
                        <div class="card-header border-0 rounded-0" id="card-header">
                            <h6 class="card-title">
                                <h3>Login</h3>
                            </h6>
                        </div>
                        <div class="card-body pt-1">
                            <form action="chek_login.php" method="POST">
                                <div class="my-4">
                                    <input type="text" name="username" class="form-control rounded-1"
                                        placeholder="Username" required>
                                </div>
                                <div class="my-4">
                                    <input type="password" name="password" class="form-control rounded-1"
                                        placeholder="Password" required>
                                </div>
                                <div class="my-2">
                                    <button type="submit" class="btn btn-success px-4 py-1 rounded-1">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/icon/all.js"></script>
    <script src="assets/datatables/datatables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
</body>

</html>