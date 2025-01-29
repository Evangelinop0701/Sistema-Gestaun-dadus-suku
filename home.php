<?php
$moris = "Moris";
$mate = "Mate";
$m = "M";
$f = "F";
?>
<div class="container p-4">
    <div class="row">

        <div class="col-lg-3 col-6 my-2">
            <!-- small box -->
            <div class="rounded-2 small-box rounded-2" style="background-color: #3e96b9;">
                <div class="text-center py-2 text-white">
                    <p class="text-uppercase" style="font-size:12px;">Total Populasaun Ativos</p>
                    <h4><i class="fa fa-user-friends display-6"></i> <span
                            class="m-2 py-5"><?= $totalMoris[0]['total_moris'] ?></span></h4>
                    <a href="more-info-<?=$moris ?>.html" class="rounded-2 small-box-footer text-white">More info <i
                            class="fas fa-arrow-circle-right"></i></a>

                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6 my-2">
            <!-- small box -->
            <div class="rounded-2 small-box bg-success">
                <div class="text-center py-2 text-white">
                    <p class="text-uppercase" style="font-size:12px;">Total Populasaun Mate</p>
                    <h4><i class="fa fa-user-friends display-6"></i> <span
                            class="m-2 py-5"><?= $totalMate[0]['total_mate'] ?></span>
                    </h4>
                    <a href="more-info-<?=$mate ?>.html" class="rounded-2 small-box-footer text-white">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6 my-2">
            <!-- small box -->
            <div class="rounded-2 small-box bg-warning">
                <div class="text-center py-2 text-white">
                    <p class="text-uppercase" style="font-size:12px;">Total Populasaun Ativos Mane</p>
                    <h4>
                        <i class="fa fa-user-friends display-6"></i>
                        <span class="m-2 py-5">
                            <?php echo $total_sexu_moris_mane[0]['all_mane'];?>
                        </span>
                    </h4>
                    <a href="popu-ativos-<?=$m ?>-status-<?=$moris ?>.html"
                        class="rounded-2 small-box-footer text-white">More info <i
                            class="fas fa-arrow-circle-right"></i></a>

                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6 my-2">
            <!-- small box -->
            <div class="rounded-2 small-box bg-danger">
                <div class="text-center py-2 text-white">
                    <p class="text-uppercase" style="font-size:12px;">Total Populasaun Ativos Feto</p>
                    <h4>
                        <i class="fa fa-user-friends display-6"></i>
                        <span class="m-2 py-5">
                            <?php echo $total_sexu_moris_feto[0]['all_feto'];?>

                        </span>
                    </h4>
                    <a href="popu-ativos-<?=$f ?>-status-<?=$moris ?>.html"
                        class="rounded-2 small-box-footer text-white">More info <i
                            class="fas fa-arrow-circle-right"></i></a>

                </div>
            </div>
        </div>


        <div class="col-lg-3 col-6 my-2">
            <!-- small box -->
            <div class="rounded-2 small-box bg-success">
                <div class="text-center py-2 text-white">
                    <p class="text-uppercase" style="font-size:12px;">Total Populasaun Mate Mane</p>
                    <h4>
                        <i class="fa fa-user-friends display-6"></i>
                        <span class="m-2 py-5">
                            <?php echo $all_mane_mate[0]['all_mane']; ?>
                        </span>
                    </h4>
                    <a href="popu-mate-sexu-<?=$m ?>-status-<?=$mate ?>.html"
                        class="rounded-2 small-box-footer text-white">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 my-2">
            <!-- small box -->
            <div class="rounded-2 small-box bg-warning">
                <div class="text-center py-2 text-white">
                    <p class="text-uppercase" style="font-size:12px;">Total Populasaun Mate Feto</p>
                    <h4>
                        <i class="fa fa-user-friends display-6"></i>
                        <span class="m-2 py-5">
                            <?php echo $all_mane_feto[0]['all_feto'];?>
                        </span>
                    </h4>
                    <a href="popu-mate-sexu-<?=$f ?>-status-<?=$mate ?>.html"
                        class="rounded-2 small-box-footer text-white">More info <i
                            class="fas fa-arrow-circle-right"></i></a>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 my-2">
            <!-- small box -->
            <div class="rounded-2 small-box rounded-2" style="background-color: #3e96b9;">
                <div class="text-center py-2 text-white">
                    <p class="text-uppercase" style="font-size:12px;">Total Familia</p>
                    <h4>
                        <i class="fa fa-user-friends display-6"></i>
                        <span class="m-2 py-5"><?= $total_familia[0]['total_familia'] ?></span>
                    </h4>
                    <a href="all-familia.html" class="rounded-2 small-box-footer text-white">More info <i
                            class="fas fa-arrow-circle-right"></i></a>

                </div>
            </div>
        </div>
        <!-- ./col -->



        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-4 shadow-lg my-2">
                        <table class="table table-bordered shadow-sm" id="table">
                            <tr class="text-uppercase text-center fw-bold text-secondary" id="row"
                                style="background-color: #a9cdf0;">
                                <th class="py-1" id="font">Total Populasaun Moris</th>
                            </tr>
                            <tr>
                                <td>
                                    <table class="table table-bordered text-secondary"
                                        style="background-color: #f7fbff;">

                                        <tr class="text-center text-uppercase text">
                                            <th class="py-1" id="font" colspan="2">Total Kada aldeia</th>
                                        </tr>
                                        <?php $data = $home->total_popu_moris();
foreach ($data as $row) { ?>
                                        <tr class="text-center text">
                                            <th class="py-1 text-secondary" id="font"><?=$row['naran_aldeia'] ?></th>
                                            <td class="py-1 text-primary fw-bold px-4" id="font">
                                                <?=$row['total_moris'] ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <tr class="text-center text-uppercase text">
                                            <th class="py-1" id="font" style="background-color: #a9cdf0; border:none;">
                                                Total
                                            </th>
                                            <td class="py-1" id="font"><?= $totalMoris[0]['total_moris'] ?></td>
                                        </tr>


                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card p-4 shadow-lg my-2">
                        <table class="table table-bordered shadow-sm" id="table">
                            <tr class="text-uppercase text-center fw-bold text-white" id="row"
                                style="background-color:#3e96b9;">
                                <th class="py-1" id="font">Total Populasaun Mate</th>
                            </tr>
                            <tr>
                                <td>
                                    <table class="table table-bordered text-secondary"
                                        style="background-color: #f7fbff;">

                                        <tr class="text-center text-uppercase text">
                                            <th class="py-1" id="font" colspan="2">Total Kada aldeia</th>
                                        </tr>
                                        <?php $data = $home->total_popu_mate();
foreach ($data as $row) { ?>
                                        <tr class="text-center text">
                                            <th class="py-1 text-secondary" id="font"><?=$row['naran_aldeia'] ?></th>
                                            <td class="py-1 text-primary fw-bold px-4" id="font">
                                                <?=$row['total_mate'] ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <tr class="text-center text-uppercase text">
                                            <th class="py-1" id="font"
                                                style="background-color: #3e96b9; border:none;color:white;">
                                                Total
                                            </th>
                                            <td class="py-1" id="font"><?= $totalMate[0]['total_mate'] ?></td>
                                        </tr>


                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card my-2 shadow-lg p-4">
                        <table class="table table-bordered" id="table">
                            <tr class="text-uppercase text-center fw-bold text-secondary bg-warning shadow-sm" id="row"
                                style="background-color: #a9cdf0;">
                                <th class="py-1" id="font" colspan="2">dados familia</th>

                            </tr>
                            <tr>
                                <td>
                                    <table class="table table-bordered text-secondary"
                                        style="background-color: #f7fbff;">

                                        <tr class="text-center text-uppercase text">
                                            <th class="py-1" id="font" colspan="2">Total familia Kada aldeia</th>
                                        </tr>
                                        <?php
foreach ($total_familia_kada_aldeia as $row) { ?>
                                        <tr class="text-center text">
                                            <th class="py-1 text-secondary" id="font"><?=$row['naran_aldeia'] ?>
                                            </th>
                                            <td class="py-1 text-primary fw-bold px-4" id="font">
                                                <?=$row['total_familia'] ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <tr class="text-center text-uppercase text">
                                            <th class="py-1 bg-warning" id="font"
                                                style="background-color: #a9cdf0; border:none;">
                                                Total
                                            </th>
                                            <td class="py-1" id="font">
                                                <?= $total_familia[0]['total_familia'] ?>
                                            </td>
                                        </tr>


                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>


            </div>
        </div>



        <div class="col-md-12">
            <div class="col-lg-12">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card p-4 shadow-lg my-2">
                            <table class="table table-bordered" id="table">
                                <tr class="text-uppercase text-center fw-bold shadow-sm text" id="row"
                                    style="background-color: #c25e57;">
                                    <th class="py-1" id="font">Populasaun Moris</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-bordered text-secondary"
                                                    style="background-color: #f7fbff;">

                                                    <tr class="text-center text-uppercase text">
                                                        <th class="py-1" id="font" colspan="2">Sexu (Mane)</th>

                                                    </tr>
                                                    <?php
        foreach ($mane_moris as $row) { ?>
                                                    <tr class="text-center text">
                                                        <th class="py-1" id="font">
                                                            <?=$row['naran_aldeia'] ?>
                                                        </th>
                                                        <td class="py-1 text-primary fw-bold px-4" id="font">
                                                            <?=$row['tota_m'] ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    <tr class="text-center text-uppercase text">
                                                        <th class="py-1 text-white" id="font"
                                                            style="background-color: #c25e57; border:none;">
                                                            Total
                                                        </th>
                                                        <td class="py-1" id="font">
                                                            <?php echo $total_sexu_moris_mane[0]['all_mane'] ?></td>
                                                    </tr>


                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-bordered text-secondary"
                                                    style="background-color: #f7fbff;">

                                                    <tr class="text-center text-uppercase text">
                                                        <th class="py-1" id="font" colspan="2">Sexu (Feto)</th>

                                                    </tr>
                                                    <?php
        foreach ($feto_moris as $row) { ?>
                                                    <tr class="text-center text">
                                                        <th class="py-1 text-secondary" id="font">
                                                            <?=$row['naran_aldeia'] ?>
                                                        </th>
                                                        <td class="py-1 text-primary fw-bold px-4" id="font">
                                                            <?=$row['tota_f'] ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    <tr class="text-center text-uppercase text-white text">
                                                        <th class="py-1" id="font"
                                                            style="background-color: #c25e57; border:none;">
                                                            Total
                                                        </th>
                                                        <td class="py-1 text-secondary" id="font">
                                                            <?php echo $total_sexu_moris_feto[0]['all_feto'] ?></td>
                                                    </tr>


                                                </table>
                                            </div>
                                        </div>

                                    </td>

                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card p-4 shadow-lg my-2">
                            <table class="table table-bordered" id="table">
                                <tr class="text-uppercase text-center fw-bold text-secondary shadow-sm text" id="row"
                                    style="background-color: #a9cdf0;">
                                    <th class="py-1" id="font">Populasaun Mate</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-bordered text-secondary"
                                                    style="background-color: #f7fbff;">

                                                    <tr class="text-center text-uppercase text">
                                                        <th class="py-1" id="font" colspan="2">Sexu (Mane)</th>

                                                    </tr>
                                                    <?php
        foreach ($tota_sexu_mate_mane as $row) { ?>
                                                    <tr class="text-center text">
                                                        <th class="py-1 text-secondary" id="font">
                                                            <?=$row['naran_aldeia'] ?>
                                                        </th>
                                                        <td class="py-1 text-primary fw-bold px-4" id="font">
                                                            <?=$row['tota_m'] ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    <tr class="text-center text-uppercase text">
                                                        <th class="py-1" id="font"
                                                            style="background-color: #a9cdf0; border:none;">
                                                            Total
                                                        </th>
                                                        <td class="py-1" id="font">
                                                            <?php echo $all_mane_mate[0]['all_mane'] ?>
                                                        </td>
                                                    </tr>


                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-bordered text-secondary"
                                                    style="background-color: #f7fbff;">

                                                    <tr class="text-center text-uppercase text">
                                                        <th class="py-1" id="font" colspan="2">Sexu (Feto)</th>

                                                    </tr>
                                                    <?php
        foreach ($tota_sexu_feto_mane as $row) { ?>
                                                    <tr class="text-center text">
                                                        <th class="py-1 text-secondary" id="font">
                                                            <?=$row['naran_aldeia'] ?>
                                                        </th>
                                                        <td class="py-1 text-primary fw-bold px-4" id="font">
                                                            <?=$row['tota_f'] ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    <tr class="text-center text-uppercase text">
                                                        <th class="py-1" id="font"
                                                            style="background-color: #a9cdf0; border:none;">
                                                            Total
                                                        </th>
                                                        <td class="py-1" id="font">
                                                            <?php echo $all_mane_feto[0]['all_feto'] ?>
                                                        </td>
                                                    </tr>


                                                </table>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>







    <!-- garafiku -->

    <div class="card my-2 shadow-lg p-4">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-4 my-2">
                    <div class="card rounded-1 shadow-sm text-lg-center" id="card">
                        <div class="card-header rounded-0" id="card-header">
                            <div class="card-title my-0 text-uppercase">
                                <span class="fw-bold text-secondary" style="font-size:12px;">Total populasaun <span
                                        class="text-primary text-decoration-underline">moris</span> baseia
                                    ba
                                    sexu</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="grafikuDonat" width="50" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 my-2">
                    <div class="card rounded-1 shadow-sm text-lg-center" id="card">
                        <div class="card-header rounded-0" id="card-header">
                            <div class="card-title my-0 text-uppercase">
                                <span class="fw-bold text-secondary" style="font-size:12px;">Total populasaun <span
                                        class="text-danger text-decoration-underline">mate</span> baseia
                                    ba
                                    sexu</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="grafikuDonatsexu" width="50" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 my-2">
                    <div class="card rounded-1 shadow-sm text-lg-center" id="card">
                        <div class="card-header rounded-0" id="card-header">
                            <div class="card-title my-0 text-uppercase">
                                <span class="fw-bold text-secondary" style="font-size:12px;">total populasaun moris
                                    kada
                                    aldeia</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="grafikuBarra" width="50" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>