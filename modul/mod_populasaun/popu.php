<?php

switch ($_GET['act']) {
    case 'popu_kada':?>
<div class="container p-4">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-md-6">
                <div class="card rounded-1">
                    <div class="card-header border-0 rounded-0" id="card-header">
                        <h6 class="card-title text-uppercase text-center my-2">Dados Populasaun Ativos Kada Aldeia</h6>
                    </div>
                    <div class="card-body pt-1">
                        <table class="table table-bordered mt-2">


                            <?php

                    $data = $aldeia->dados_aldeia();
        foreach ($data as $row) {?>
                            <tr>
                                <td class="py-1 text-center"><a href="dados-populasaun-<?= $row['id_aldeia']; ?>.html"
                                        style="text-decoration:none;">Aldeia
                                        [<?= $row['naran_aldeia'] ?>]</a></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</div>
<?php break;
    case 'read':?>

<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dados Populasaun</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    <?php $al = $aldeia->dados_aldeia_id($_GET['id_aldeia']); ?>
                    Dados Populasaun husi aldeia [ <b><u><?=$al[0]['naran_aldeia'] ?></u></b> ]
                </div>
            </div>
            <div class="card-body">
                <div class="container">


                    <table class="table table-bordered table-responsive-sm py-3 customers" id="example">
                        <thead>
                            <tr>
                                <th class="py-1">No</th>
                                <th class="py-1">Naran</th>
                                <th class="py-1">Sexu</th>
                                <th class="py-1">Suku</th>
                                <th class="py-1">Aldeia</th>
                                <th class="py-1">Hela Fatin</th>

                                <!-- Add other columns as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                                    $d_popu = $populasaun->popu_ativos($_GET['id_aldeia']);
        $no = 1;
        foreach ($d_popu as $row) {
            ?>
                            <tr>
                                <td class="py-1"><?= $no; ?></td>
                                <td class="py-1"><?= $row['naran_populasaun']; ?>
                                </td>
                                <td class="py-1"><?= $row['sexu']; ?></td>
                                <td class="py-1"><?= $row['naran_suku']; ?></td>
                                <td class="py-1"><?= $row['naran_aldeia']; ?></td>
                                <td class="py-1"><?= $row['residensia_atual']; ?></td>

                            </tr>
                            <?php $no++;
        } ?>
                            <!-- Add more data rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<?php break;
    case 'detalho_popu':

        $dt_popu = $populasaun->dados_form($_GET['id_p']);

        ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <?php if ($_SESSION['kargu'] == "Sekeretaria" | $_SESSION['kargu'] == "Chefe do Suku") { ?>
            <li class="breadcrumb-item"><a href="dados-populasaun-<?=$_GET['id_a'] ?>.html">Dados Populasaun</a></li>
            <?php } else {?>
            <li class="breadcrumb-item"><a href="dados-populasaun-<?=$_SESSION['id_aldeia'] ?>.html">Dados
                    Populasaun</a></li>
            <?php } ?>
            <li class="breadcrumb-item active">Deatallo Populasaun</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Identidade pessoal husi [<b><u><?= $dt_popu[0]['naran_populasaun'];?></u></b>]
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <h4 class="text-uppercase text-center  py-0">
                                identidade pessoal
                            </h4>
                        </div>
                    </div>

                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <div class="table-responsive-lg">
                                        <table class="table table-bordered table-responsive-md">
                                            <tr class="text-center">
                                                <th colspan="2" class="py-1">Identidade Pessoal</th>
                                            </tr>
                                            <tr>
                                                <th class="py-1">
                                                    <span>Naran</span>
                                                </th>
                                                <td class="py-1">
                                                    <span><?= $dt_popu[0]['naran_populasaun']; ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">
                                                    <span>Numeru Eleitoral</span>
                                                </th>
                                                <td class="py-1">
                                                    <span><?= $dt_popu[0]['no_eleitoral']; ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">
                                                    <span>Sexu</span>
                                                </th>
                                                <td class="py-1">
                                                    <span><?= $dt_popu[0]['sexu']; ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">
                                                    <span>Idade</span>
                                                </th>
                                                <td class="py-1">
                                                    <span>
                                                        <?= convert_tinan($dt_popu[0]['data_moris'], date('Y-m-d'));?>
                                                        Anos
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="py-1">
                                                    <span>Religiaun</span>
                                                </th>
                                                <td class="py-1">
                                                    <span>
                                                        <?=$dt_popu[0]['s_civil'];?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">
                                                    <span>Profisaun</span>
                                                </th>
                                                <td class="py-1">
                                                    <span>
                                                        <?=$dt_popu[0]['profisaun'];?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">
                                                    <span>Residensia Atual</span>
                                                </th>
                                                <td class="py-1">
                                                    <span>
                                                        <?=$dt_popu[0]['residensia_atual'];?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">
                                                    <span>Estadu</span>
                                                </th>
                                                <td class="py-1">
                                                    <span>
                                                        <?=$dt_popu[0]['status'];?>
                                                    </span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="table-responsive-lg">
                                        <table class="table table-bordered table-responsive-md">
                                            <tr class="text-center">
                                                <th colspan="2" class="py-1">Originalidade</th>
                                            </tr>
                                            <tr>
                                                <th class="py-1">Munisipiu</th>
                                                <td class="py-1"><?= $dt_popu[0]['naran_mun'];  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">Postu Administrativu</th>
                                                <td class="py-1"><?= $dt_popu[0]['naran_postu'];  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">Suku</th>
                                                <td class="py-1"><?= $dt_popu[0]['naran_suku'];  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">Aldeia</th>
                                                <td class="py-1"><?= $dt_popu[0]['naran_aldeia'];  ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>










<!-- More Info -->
<?php break;
    case 'popu_ativos':
        $d_popu = $populasaun->dados_populasaun_ativos($_GET['status']);
        if ($_GET['status'] == "Moris") { ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dados Populasaun <?=$_GET['status'];?></li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Dados Populasaun <?=$_GET['status'] ?>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="table-responsive-lg">
                        <table class="table table-bordered table-responsive-sm py-3 customers" id="example">
                            <thead>
                                <tr>
                                    <th class="py-1">No</th>
                                    <th class="py-1">Naran</th>
                                    <th class="py-1">Sexu</th>
                                    <th class="py-1">Suku</th>
                                    <th class="py-1">Aldeia</th>
                                    <th class="py-1">Hela Fatin</th>
                                    <th class="py-1">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
            $no = 1;
            foreach ($d_popu as $row) {?>
                                <tr>
                                    <td class="py-1"><?= $no; ?></td>
                                    <td class="py-1"><a id="class" style="text-decoration:none;"
                                            href="popu-detallu-<?=$row['id_populasaun']?>-status-<?=$row['status'] ?>.html"><?= $row['naran_populasaun']; ?></a>
                                    </td>
                                    <td class="py-1"><?= $row['sexu']; ?></td>
                                    <td class="py-1"><?= $row['naran_suku']; ?></td>
                                    <td class="py-1"><?= $row['naran_aldeia']; ?></td>
                                    <td class="py-1"><?= $row['residensia_atual']; ?></td>
                                    <td class="py-1"><?= $row['status']; ?></td>


                                </tr>
                                <?php $no++;
            } ?>
                                <!-- Add more data rows as needed -->
                            </tbody>
                    </div>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?php } else {
    $p_mate = $popu_mate->popu_mate_info(); ?>


<div class="container p-4">
    <div class="col-lg-12">
        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dados Populasaun <?=$_GET['status'] ?></li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Dados Populasaun <?=$_GET['status'] ?>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table table-bordered table-responsive-sm py-3 customers" id="example">
                        <thead>
                            <tr>
                                <th class="py-1">No</th>
                                <th class="py-1">Naran</th>
                                <th class="py-1">Sexu</th>
                                <th class="py-1">Suku</th>
                                <th class="py-1">Aldeia</th>
                                <th class="py-1">Mate ho Idade</th>
                                <th class="py-1">Estadu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
    $no = 1;
    foreach ($p_mate as $row) {
        ?>
                            <tr>
                                <td class="py-1"><?= $no; ?></td>
                                <td class="py-1"><a id="class" style="text-decoration:none;"
                                        href="popu-detallu-<?=$row['id_mate']?>-status-<?=$row['status'] ?>.html"><?= $row['naran_populasaun']; ?></a>
                                </td>
                                <td class="py-1"><?= $row['sexu']; ?></td>
                                <td class="py-1"><?= $row['naran_suku']; ?></td>
                                <td class="py-1"><?= $row['naran_aldeia']; ?></td>
                                <td class="py-1"><?= convert_tinan($row['data_moris'], $row['data_mate']) ?> Anos</td>
                                <td class="py-1"><?= $row['status']; ?></td>
                            </tr>
                            <?php $no++;
    } ?>
                            <!-- Add more data rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?php } ?>
<?php break;
    case 'more_info_detail':
        $dt_popu = $populasaun->datallu_dados_popu_status($_GET['id_p'], $_GET['status']);
        if ($_GET['status'] == "Moris") { ?>

<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Deatallo Populasaun</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Identidade pessoal husi [<b><u><?= $dt_popu[0]['naran_populasaun'];?></u></b>]
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <h4 class="text-uppercase text-center  py-0">
                                identidade pessoal
                            </h4>
                        </div>
                    </div>

                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <div class="table-responsive-lg">
                                        <table class="table table-bordered table-responsive-md">
                                            <tr class="text-center">
                                                <th colspan="2" class="py-1">Identidade Pessoal</th>
                                            </tr>
                                            <tr>
                                                <th class="py-1">
                                                    <span>Naran</span>
                                                </th>
                                                <td class="py-1">
                                                    <span><?= $dt_popu[0]['naran_populasaun']; ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">
                                                    <span>Numeru Eleitoral</span>
                                                </th>
                                                <td class="py-1">
                                                    <span><?= $dt_popu[0]['no_eleitoral']; ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">
                                                    <span>Sexu</span>
                                                </th>
                                                <td class="py-1">
                                                    <span><?= $dt_popu[0]['sexu']; ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">
                                                    <span>Idade</span>
                                                </th>
                                                <td class="py-1">
                                                    <span>
                                                        <?= convert_tinan($dt_popu[0]['data_moris'], date('Y-m-d'));?>
                                                        Anos
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="py-1">
                                                    <span>Religiaun</span>
                                                </th>
                                                <td class="py-1">
                                                    <span>
                                                        <?=$dt_popu[0]['s_civil'];?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">
                                                    <span>Profisaun</span>
                                                </th>
                                                <td class="py-1">
                                                    <span>
                                                        <?=$dt_popu[0]['profisaun'];?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">
                                                    <span>Residensia Atual</span>
                                                </th>
                                                <td class="py-1">
                                                    <span>
                                                        <?=$dt_popu[0]['residensia_atual'];?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">
                                                    <span>Estadu</span>
                                                </th>
                                                <td class="py-1">
                                                    <span>
                                                        <?=$dt_popu[0]['status'];?>
                                                    </span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="table-responsive-lg">
                                        <table class="table table-bordered table-responsive-md">
                                            <tr class="text-center">
                                                <th colspan="2" class="py-1">Originalidade</th>
                                            </tr>
                                            <tr>
                                                <th class="py-1">Munisipiu</th>
                                                <td class="py-1"><?= $dt_popu[0]['naran_mun'];  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">Postu Administrativu</th>
                                                <td class="py-1"><?= $dt_popu[0]['naran_postu'];  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">Suku</th>
                                                <td class="py-1"><?= $dt_popu[0]['naran_suku'];  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="py-1">Aldeia</th>
                                                <td class="py-1"><?= $dt_popu[0]['naran_aldeia'];  ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php } else {

    $dt_popu_mate = $popu_mate->detalho_populasaun_mate($_GET['id_p']);
    ?>
<div class="container p-4">

    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Deatallo Populasaun Mate</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Identidade pessoal husi [<b><u><?= $dt_popu_mate[0]['naran_populasaun'];?></u></b>]
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <h4 class="text-uppercase text-center  py-0">
                                identidade pessoal
                            </h4>
                        </div>
                    </div>

                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <table class="table table-bordered table-responsive-md">
                                        <tr class="text-center">
                                            <th colspan="2" class="py-1">Identidade Pessoal</th>
                                        </tr>
                                        <tr>
                                            <th class="py-1">
                                                <span>Naran</span>
                                            </th>
                                            <td class="py-1">
                                                <span><?= $dt_popu_mate[0]['naran_populasaun']; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="py-1">
                                                <span>Numeru Eleitoral</span>
                                            </th>
                                            <td class="py-1">
                                                <span><?= $dt_popu_mate[0]['no_eleitoral']; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="py-1">
                                                <span>Sexu</span>
                                            </th>
                                            <td class="py-1">
                                                <span><?= $dt_popu_mate[0]['sexu']; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="py-1">
                                                <span>Data Moris</span>
                                            </th>
                                            <td class="py-1">
                                                <span>
                                                    <?= $dt_popu_mate[0]['data_moris'] ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="py-1">
                                                <span>Mate ho Idade</span>
                                            </th>
                                            <td class="py-1">
                                                <span>
                                                    <?= convert_tinan($dt_popu_mate[0]['data_moris'], $dt_popu_mate[0]['data_mate'])?>
                                                    Anos
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="py-1">
                                                <span>Religiaun</span>
                                            </th>
                                            <td class="py-1">
                                                <span>
                                                    <?=$dt_popu_mate[0]['s_civil'];?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="py-1">
                                                <span>Profisaun</span>
                                            </th>
                                            <td class="py-1">
                                                <span>
                                                    <?=$dt_popu_mate[0]['profisaun'];?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="py-1">
                                                <span>Residensia Atual</span>
                                            </th>
                                            <td class="py-1">
                                                <span>
                                                    <?=$dt_popu_mate[0]['residensia_atual'];?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="py-1">
                                                <span>Estadu</span>
                                            </th>
                                            <td class="py-1">
                                                <span>
                                                    <?=$dt_popu_mate[0]['status'];?>
                                                </span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-5">
                                    <table class="table table-bordered table-responsive-md">
                                        <tr class="text-center">
                                            <th colspan="2" class="py-1">Originalidade</th>
                                        </tr>
                                        <tr>
                                            <th class="py-1">Munisipiu</th>
                                            <td class="py-1"><?= $dt_popu_mate[0]['naran_mun'];  ?></td>
                                        </tr>
                                        <tr>
                                            <th class="py-1">Postu Administrativu</th>
                                            <td class="py-1"><?= $dt_popu_mate[0]['naran_postu'];  ?></td>
                                        </tr>
                                        <tr>
                                            <th class="py-1">Suku</th>
                                            <td class="py-1"><?= $dt_popu_mate[0]['naran_suku'];  ?></td>
                                        </tr>
                                        <tr>
                                            <th class="py-1">Aldeia</th>
                                            <td class="py-1"><?= $dt_popu_mate[0]['naran_aldeia'];  ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php } ?>
<?php break;
    case 'ativus_mane_feto':

        $d_popu = $populasaun->detalho_sexu_feto_mane($_GET['sexu'], $_GET['status']);

        ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dados Populasaun <?=$_GET['status'];
        if ($_GET['sexu'] == "M") {
            echo " Mane";
        } else {
            echo " Feto";
        }?></li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Dados Populasaun <?=$_GET['status'] ?>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="table-responsive-lg">
                        <table class="table table-bordered table-responsive-sm py-3 customers" id="example">
                            <thead>
                                <tr>
                                    <th class="py-1">No</th>
                                    <th class="py-1">Naran</th>
                                    <th class="py-1">Sexu</th>
                                    <th class="py-1">Suku</th>
                                    <th class="py-1">Aldeia</th>
                                    <th class="py-1">Hela Fatin</th>
                                    <th class="py-1">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        $no = 1;
        foreach ($d_popu as $row) {?>
                                <tr>
                                    <td class="py-1"><?= $no; ?></td>
                                    <td class="py-1"><a id="class" style="text-decoration:none;"
                                            href="popu-detallu-<?=$row['id_populasaun']?>-status-<?=$row['status'] ?>.html"><?= $row['naran_populasaun']; ?></a>
                                    </td>
                                    <td class="py-1"><?= $row['sexu']; ?></td>
                                    <td class="py-1"><?= $row['naran_suku']; ?></td>
                                    <td class="py-1"><?= $row['naran_aldeia']; ?></td>
                                    <td class="py-1"><?= $row['residensia_atual']; ?></td>
                                    <td class="py-1"><?= $row['status']; ?></td>


                                </tr>
                                <?php $no++;
        } ?>
                                <!-- Add more data rows as needed -->
                            </tbody>
                    </div>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?php break;
    case 'mate_mane_feto':

        $p_mate = $popu_mate->popu_mate_mane_feto($_GET['sexu'], $_GET['status']);

        ?>
<div class="container p-4">
    <div class="col-lg-12">
        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dados Populasaun <?=$_GET['status'] ?></li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Dados Populasaun <?=$_GET['status'] ?>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table table-bordered table-responsive-sm py-3 customers" id="example">
                        <thead>
                            <tr>
                                <th class="py-1">No</th>
                                <th class="py-1">Naran</th>
                                <th class="py-1">Sexu</th>
                                <th class="py-1">Suku</th>
                                <th class="py-1">Aldeia</th>
                                <th class="py-1">Mate ho Idade</th>
                                <th class="py-1">Estadu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
        $no = 1;
        foreach ($p_mate as $row) {
            ?>
                            <tr>
                                <td class="py-1"><?= $no; ?></td>
                                <td class="py-1"><a id="class" style="text-decoration:none;"
                                        href="popu-detallu-<?=$row['id_mate']?>-status-<?=$row['status'] ?>.html"><?= $row['naran_populasaun']; ?></a>
                                </td>
                                <td class="py-1"><?= $row['sexu']; ?></td>
                                <td class="py-1"><?= $row['naran_suku']; ?></td>
                                <td class="py-1"><?= $row['naran_aldeia']; ?></td>
                                <td class="py-1"><?= convert_tinan($row['data_moris'], $row['data_mate']) ?> Anos</td>
                                <td class="py-1"><?= $row['status']; ?></td>
                            </tr>
                            <?php $no++;
        } ?>
                            <!-- Add more data rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?php break; ?>
<?php } ?>