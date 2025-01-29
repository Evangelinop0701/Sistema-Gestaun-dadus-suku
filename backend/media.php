<?php
session_start();
error_reporting(0);
include "class/class.php";
include "class/lib.php";

$db = new database();
$user = new user();
$aldeia = new aldeia();
$populasaun = new populasaun();
$popu_mate = new populasaun_mate();
$familia = new familia();
$membru = new membru();
$estrutura = new estrutura();
$periodo = new periodo();
$home = new home();
$info = new info();
$sugere = new sugere();

if (!$user->get_sessi()) {
    header('location: ../login.html');
}
// mate
$totalMate = $home->total_mate_all();
$tota_sexu_mate_mane = $home->popu_mate_sexu_mane_total_kada_aldeia();
$tota_sexu_feto_mane = $home->popu_mate_sexu_feto_total_kada_aldeia();
$all_mane_mate = $home->all_mate_total_sexu_mane();
$all_mane_feto = $home->all_mate_total_sexu_feto();
// moris
$totalMoris = $home->total_moris_all();
$mane_moris = $home->sexu_moris_aldeia_mane();
$feto_moris = $home->sexu_moris_aldeia_feto();
$total_sexu_moris_mane = $home->all_moris_total_sexu_mane();
$total_sexu_moris_feto = $home->all_moris_total_sexu_feto();

// familia
$total_familia_kada_aldeia = $home->total_familia_kada_aldeia();
$total_familia = $home->total_familia();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIGD-Suku</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/local.css" rel="stylesheet" />
    <link href="assets/icon/all.css" rel="stylesheet" />
    <link href="assets/datatables/datatables.min.css" rel="stylesheet" />
    <style type="text/css">
    body {
        font-family: 'Quicksand', sans-serif;
    }



    .customers {
        font-family: 'Quicksand', sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .customers td,
    .customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .customers tr>td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .customers tr:hover {
        background-color: #ddd;
        border: 1px solid #ddd;
    }

    .customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        /*background-color: #04AA6D; 
         color: white; */
    }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <?php include "nav2.php"; ?>
    <!-- Header-->
    <div class="container-fluid mt-5">
        <?php include "conten.php";?>
    </div>

    <footer class="py-5">
        <div class="container px-4">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
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
    <script src="assets/graficu/chart.js"></script>

    <script>
    var ctx = document.getElementById("grafikuDonat").getContext("2d");
    var data = {
        labels: [<?php foreach ($home->sexu_moris() as $row) {
            echo '"' . $row['sexu'] . '",';
        } ?>],
        datasets: [{
            data: [<?php foreach ($home->sexu_moris() as $row) {
                echo '"' . $row['total'] . '",';
            } ?>],
            backgroundColor: ['#00a65a', '#f39c12'],
        }, ],
    };

    var myDonutChart = new Chart(ctx, {
        type: "doughnut",
        data: data,
    });
    </script>
    <script>
    var ctx = document.getElementById("grafikuDonatsexu").getContext("2d");
    var data = {
        labels: [<?php foreach ($home->sexu_mate() as $row) {
            echo '"' . $row['sexu'] . '",';
        } ?>],
        datasets: [{
            data: [<?php foreach ($home->sexu_mate() as $row) {
                echo '"' . $row['total'] . '",';
            } ?>],
            backgroundColor: ['#f56954', '#d2d6de'],
        }, ],
    };

    var myDonutChart = new Chart(ctx, {
        type: "doughnut",
        data: data,
    });
    </script>
    <script>
    var ctx = document.getElementById("grafikuBarra").getContext("2d");
    var data = {
        labels: [<?php foreach ($home->total_popu_moris() as $row) {
            echo '"' . $row['naran_aldeia'] . '",';
        } ?>],
        datasets: [{
            label: "Total Populasaun",
            data: [<?php foreach ($home->total_popu_moris() as $row) {
                echo '"' . $row['total_moris'] . '",';
            } ?>],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }, ],
    };

    var myBarChart = new Chart(ctx, {
        type: "bar",
        data: data,
    });
    </script>






    <!-- dados familia -->
    <script>
    var ctx = document.getElementById("dados_familia").getContext("2d");
    var data = {
        labels: [<?php foreach ($total_familia_kada_aldeia as $row) {
            echo '"' . $row['naran_aldeia'] . '",';
        } ?>],
        datasets: [{
            label: "Total Populasaun",
            data: [<?php foreach ($total_familia_kada_aldeia as $row) {
                echo '"' . $row['total_familia'] . '",';
            } ?>],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }, ],
    };

    var myBarChart = new Chart(ctx, {
        type: "bar",
        data: data,
    });
    </script>
</body>

</html>