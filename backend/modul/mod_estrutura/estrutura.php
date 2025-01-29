<?php

switch ($_GET['act']) {
    case 'read':?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dados Estrutura</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    estrutura suku
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 my-2">
                        <div class="container">
                            <ol class="breadcrumb bg-secondary rounded-1 px-4 py-1">
                                <li class="breadcrumb-item pt-2">
                                    <h6 class="text-capitalize"><i class="fa-solid fa-list-check"></i>
                                        ESTRUTURA SUKU BASEIA BA
                                        PERIODU
                                    </h6>
                                </li>
                            </ol>
                            <table class="table table-bordered table-responsive-sm py-3" id="">
                                <thead>
                                    <tr>
                                        <th class="py-1">No</th>
                                        <th class="py-1">Periodo</th>
                                        <th class="py-1">Estatus</th>
                                        <?php if ($_SESSION['kargu'] == "Chefe do Suku") {
                                            echo "";
                                        } elseif ($_SESSION['kargu'] == "Chefe Aldeia") {
                                            echo "";
                                        } elseif ($_SESSION['kargu'] == "Sekretaria") { ?>
                                        <th class="py-1">Asaun</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                                   $per = $periodo->periodo();
        $no = 1;
        foreach ($per as $row) {
            ?>
                                    <tr>
                                        <td class="py-1"><?= $no; ?></td>
                                        <td class="py-1"><a id="class" style="text-decoration:none;"
                                                href="detalho-periodo-<?=$row['id_periodo']?>.html"><?= $row['periodo']; ?></a>
                                        </td>
                                        <td class="py-1 text-center">
                                            <?php if ($row['status_p'] == "Y") { ?>
                                            <i class="fa fa-check-circle text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
                                        <td class="py-1">
                                            <?php if ($row['status_p'] == "Y") { ?>
                                            <a href="input-estrutura-<?=$row['id_periodo']?>.html"
                                                class="btn btn-sm btn-warning py-0"><i class="fa fa-plus-circle"></i>
                                                Aumenta dados</a>
                                            <?php } else {?>
                                            <a href="input-estrutura-<?=$row['id_periodo']?>.html"
                                                class="btn btn-sm btn-warning py-0 disabled"><i
                                                    class="fa fa-plus-circle"></i> Aumenta dados</a>
                                            <?php } ?>
                                        </td>
                                        <?php } else {
                                            echo "";
                                        } ?>
                                    </tr>
                                    <?php $no++;
        } ?>
                                    <!-- Add more data rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-7 my-2">
                        <div class="container">
                            <ol class="breadcrumb bg-success rounded-1 px-4 py-1">
                                <li class="breadcrumb-item pt-2">
                                    <h6><i class="fa-solid fa-list-check"></i> KONSELLU SUKU NO ESTRUTURA SUKU
                                        ATUAL TINAN
                                        [<?= @$_SESSION['periodo']; ?>]
                                    </h6>
                                </li>
                            </ol>
                            <table class="table table-bordered table-responsive-sm py-3" id="">
                                <thead>
                                    <tr>
                                        <th class="py-1">No</th>
                                        <th class="py-1">Naran</th>
                                        <th class="py-1">Kargu</th>
                                        <th class="py-1">Suku/Aldeia</th>
                                        <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
                                        <th class="py-1">Asaun</th>
                                        <?php } else {
                                            echo "";
                                        } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                                                               $est = $estrutura->estrutura();
        $no = 1;
        foreach ($est as $row) {
            ?>
                                    <tr>
                                        <td class="py-1"><?= $no; ?></td>
                                        <td class="py-1"><a id="class" style="text-decoration:none;"
                                                href="detalho-estrutura-<?=$row['id_konselu']?>.html"><?= $row['naran_populasaun']; ?></a>
                                        </td>
                                        <td class="py-1"><?= $row['kargu']; ?></td>
                                        <td class="py-1">
                                            <?php
                                            if ($row['kargu'] == "Chefe do Suku") {
                                                echo $row['kargu'] . " " . $row['naran_suku'] . "";
                                            } elseif ($row['kargu'] == "Sekretaria") {
                                                echo $row['kargu'] . " Suku " . $row['naran_suku'] . "";
                                            } elseif($row['kargu'] == "Chefe Aldeia") {
                                                echo $row['kargu'] . " " . $row['naran_aldeia'];
                                            } else {
                                                echo $row['kargu'] . " Aldeia " . $row['naran_aldeia'];
                                            }
            ?>
                                        </td>
                                        <?php if ($_SESSION['kargu'] == "Sekretaria") {?>
                                        <td>
                                            <a href="update-estrutura-<?=$row['id_konselu']?>.html"
                                                class="btn btn-sm py-0 btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="modul/mod_estrutura/aksi.php?act=delete&id_e=<?=$row['id_konselu']?>&file=<?=$row['foto']?>"
                                                class="btn btn-sm py-0 btn-dark"><i class="fa fa-trash"></i></a>
                                        </td>
                                        <?php } ?>

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

    </div>
</div>
<?php break;
    case 'input': ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="estrutura.html">Dados Estrutura</a></li>
            <li class="breadcrumb-item active">Aumenta dados Estrutura</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Aumenta dados Estrutura
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <form action="modul/mod_estrutura/aksi.php?act=input&id_e=<?=$_GET['id_e']?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Naran Estrutura<sub
                                            style="color:red;">*</sub></label>
                                    <select name="id_populasaun" class="form-control form-control-sm" required>
                                        <option value="" selected hidden>Hili naran Estrutura</option>
                                        <?php
                                            $po_mate = $populasaun->dados_populasaun();
        foreach ($po_mate as $row) { ?>
                                        <option value="<?= $row['id_populasaun']; ?>">
                                            <?=$row['naran_populasaun'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Grau Eduksaun<sub
                                            style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="grau_edukasaun"
                                        aria-describedby="emailHelp" placeholder="Prense Grau Edukasaun" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Kargu<sub style="color:red;">*</sub></label>
                                    <select name="kargu" id="" class="form-control form-control-sm" required>
                                        <option value="" selected hidden>Grau Edukasaun</option>
                                        <option value="Chefe do Suku">Chefe do Suku</option>
                                        <option value="Chefe Aldeia">Chefe Aldeia</option>
                                        <option value="Sekretaria">Sekretaria</option>
                                        <option value="Delegado">Delegado</option>
                                        <option value="Delegada">Delegada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Periodo<sub style="color:red;">*</sub></label>
                                    <select name="id_periodo" class="form-control form-control-sm" required>
                                        <option value="" selected hidden>Hili Periodo</option>
                                        <?php
                                            $per = $periodo->periodo_y();
        foreach ($per as $row) { ?>
                                        <option value="<?= $row['id_periodo']; ?>">
                                            <?=$row['periodo'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Foto<sub style="color:red;"></sub></label>
                                    <input type="file" class="form-control form-control-sm" id="" name="f_upload"
                                        aria-describedby="emailHelp" placeholder="Prense Grau Edukasaun">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-sm btn-success px-3"><i
                                            class="fa fa-check-circle"></i> Save</button>
                                    <button type="reset" class="btn btn-sm btn-danger px-3"><i
                                            class="fa-solid fa-arrows-rotate"></i> Kansela</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?php break;
    case 'update':
        $up_e = $estrutura->select_form($_GET['id_e']);
        ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="estrutura.html">Dados Estrutura</a></li>
            <li class="breadcrumb-item active">Hadia dados Estrutura</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Hadia dados Estrutura
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <form action="modul/mod_estrutura/aksi.php?act=update&id_e=<?=$_GET['id_e']?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Naran Estrutura<sub
                                            style="color:red;">*</sub></label>
                                    <select name="id_populasaun" class="form-control form-control-sm" required>
                                        <option value="<?= $up_e[0]['id_populasaun']; ?>" selected hidden>
                                            <?= $up_e[0]['naran_populasaun']; ?></option>
                                        <?php
                                            $po_mate = $populasaun->dados_populasaun();
        foreach ($po_mate as $row) { ?>
                                        <option value="<?= $row['id_populasaun']; ?>">
                                            <?=$row['naran_populasaun'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Grau Eduksaun<sub
                                            style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="grau_edukasaun"
                                        aria-describedby="emailHelp" value="<?=
$up_e[0]['naran_populasaun'];
        ?>" placeholder="Prense Grau Edukasaun" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Kargu<sub style="color:red;">*</sub></label>
                                    <select name="kargu" id="" class="form-control form-control-sm" required>
                                        <option value="<?= $up_e[0]['kargu']; ?>" selected hidden>
                                            <?= $up_e[0]['kargu']; ?></option>
                                        <option value="Chefe do Suku">Chefe do Suku</option>
                                        <option value="Chefe Aldeia">Chefe Aldeia</option>
                                        <option value="Sekretaria">Sekretaria</option>
                                        <option value="Delegado">Delegado</option>
                                        <option value="Delegada">Delegada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Periodo<sub style="color:red;">*</sub></label>
                                    <select name="id_periodo" class="form-control form-control-sm" required>
                                        <option value="<?= $up_e[0]['id_periodo']; ?>" selected hidden>
                                            <?= $up_e[0]['periodo']; ?></option>
                                        <?php
                                                   $per = $periodo->periodo_y();
        foreach ($per as $row) { ?>
                                        <option value="<?= $row['id_periodo']; ?>">
                                            <?=$row['periodo'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">

                                    <label for="" class="form-label">Foto<sub style="color:red;"></sub></label>
                                    <input type="file" class="form-control form-control-sm" id="" name="f_upload"
                                        aria-describedby="emailHelp" placeholder="Prense Grau Edukasaun">

                                    <input type="hidden" value="<?= $up_e[0]['foto']; ?>" name="foto">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-sm btn-success px-3"><i
                                            class="fa fa-check-circle"></i> Hadia</button>
                                    <button type="reset" class="btn btn-sm btn-danger px-3"><i
                                            class="fa-solid fa-arrows-rotate" onclick="self.history.back()"></i>
                                        Kansela</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?php break;
    case 'detalho':

        $dt = $estrutura->select_form($_GET['id_e']);

        ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="estrutura.html">Dados Estrutura</a></li>
            <li class="breadcrumb-item active">Deatallo Estrutura</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Identidade pessoal husi [<b><u><?= $dt[0]['naran_populasaun'];?></u></b>]
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <h2 class="text-uppercase text-center  py-0">
                                identidade pessoal
                            </h2>
                        </div>
                    </div>

                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <table class="table my-2">
                                        <tr>
                                            <td>
                                                <h5>Naran</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $dt[0]['naran_populasaun']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Grau Edukasaun</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $dt[0]['grau_edukasaun']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Estadu Sivil</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $dt[0]['s_civil']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Religiaun</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $dt[0]['religiaun']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Kargu</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $dt[0]['kargu']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Postu</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $dt[0]['naran_postu']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Suku</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $dt[0]['naran_suku']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Aldeia</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $dt[0]['naran_aldeia']; ?></h5>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-5 text-center">
                                    <img src="foto_estrutura/<?= $dt[0]['foto'] ?>" class="img-thumbnail rounded-0"
                                        style="width:500px; height:400px;" alt="...">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php break;
    case 'det_periodo':


        $est = $estrutura->detalho_periodo($_GET['id_p']);


        ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="estrutura.html">Estrutura</a></li>
            <li class="breadcrumb-item active">Estrutura kada Periodo</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    estrutura suku
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 my-2">
                        <div class="container">
                            <ol class="breadcrumb bg-secondary rounded-1 px-4 py-1">
                                <li class="breadcrumb-item pt-2">
                                    <h6 class="text-capitalize"><i class="fa-solid fa-list-check"></i>
                                        ESTRUTURA SUKU BASEIA BA
                                        PERIODU
                                    </h6>
                                </li>
                            </ol>
                            <table class="table table-bordered table-responsive-sm py-3" id="">
                                <thead>
                                    <tr>
                                        <th class="py-1">No</th>
                                        <th class="py-1">Periodo</th>
                                        <th class="py-1">Estatus</th>
                                        <?php if ($_SESSION['kargu'] == "Chefe do Suku") {
                                            echo "";
                                        } elseif ($_SESSION['kargu'] == "Chefe Aldeia") {
                                            echo "";
                                        } elseif ($_SESSION['kargu'] == "Sekretaria") { ?>
                                        <th class="py-1">Asaun</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                                   $per = $periodo->periodo();
        $no = 1;
        foreach ($per as $row) {
            ?>
                                    <tr>
                                        <td class="py-1"><?= $no; ?></td>
                                        <td class="py-1"><a id="class" style="text-decoration:none;"
                                                href="detalho-periodo-<?=$row['id_periodo']?>.html"><?= $row['periodo']; ?></a>
                                        </td>
                                        <td class="py-1 text-center">
                                            <?php if ($row['status_p'] == "Y") { ?>
                                            <i class="fa fa-check-circle text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
                                        <td class="py-1">
                                            <?php if ($row['status_p'] == "Y") { ?>
                                            <a href="input-estrutura-<?=$row['id_periodo']?>.html"
                                                class="btn btn-sm btn-warning py-0"><i class="fa fa-plus-circle"></i>
                                                Aumenta dados</a>
                                            <?php } else {?>
                                            <a href="input-estrutura-<?=$row['id_periodo']?>.html"
                                                class="btn btn-sm btn-warning py-0 disabled"><i
                                                    class="fa fa-plus-circle"></i> Aumenta dados</a>
                                            <?php } ?>
                                        </td>
                                        <?php } else {
                                            echo "";
                                        } ?>
                                    </tr>
                                    <?php $no++;
        } ?>
                                    <!-- Add more data rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-7 my-2">
                        <div class="container">
                            <ol class="breadcrumb bg-success rounded-1 px-4 py-1">
                                <li class="breadcrumb-item pt-2">
                                    <h6><i class="fa-solid fa-list-check"></i> KONSELLU SUKU NO ESTRUTURA SUKU
                                        ATUAL TINAN
                                        [<?= $est[0]['periodo']?>]
                                    </h6>
                                </li>
                            </ol>
                            <table class="table table-bordered table-responsive-sm py-3" id="">
                                <thead>
                                    <tr class="bg-danger">
                                        <th class="py-1">No</th>
                                        <th class="py-1">Naran</th>
                                        <th class="py-1">Kargu</th>
                                        <th class="py-1">Suku/Aldeia</th>
                                        <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
                                        <th class="py-1">Asaun</th>
                                        <?php } else {
                                            echo "";
                                        } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


        $no = 1;
        foreach ($est as $row) {
            ?>
                                    <tr>
                                        <td class="py-1"><?= $no; ?></td>
                                        <td class="py-1"><a id="class" style="text-decoration:none;"
                                                href="detalho-estrutura-<?=$row['id_konselu']?>.html"><?= $row['naran_populasaun']; ?></a>
                                        </td>
                                        <td class="py-1"><?= $row['kargu']; ?></td>
                                        <td class="py-1">
                                            <?php
                                            if ($row['kargu'] == "Chefe do Suku") {
                                                echo $row['kargu'] . " " . $row['naran_suku'] . "";
                                            } elseif ($row['kargu'] == "Sekretaria") {
                                                echo $row['kargu'] . " Suku " . $row['naran_suku'] . "";
                                            } elseif($row['kargu'] == "Chefe Aldeia") {
                                                echo $row['kargu'] . " " . $row['naran_aldeia'];
                                            } else {
                                                echo $row['kargu'] . " Aldeia " . $row['naran_aldeia'];
                                            }
            ?>
                                        </td>
                                        <?php if ($_SESSION['kargu'] == "Sekretaria") {?>
                                        <td>
                                            <a href="update-estrutura-<?=$row['id_konselu']?>.html"
                                                class="btn btn-sm py-0 btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="modul/mod_estrutura/aksi.php?act=delete&id_e=<?=$row['id_konselu']?>&file=<?=$row['foto']?>"
                                                class="btn btn-sm py-0 btn-dark"><i class="fa fa-trash"></i></a>
                                        </td>
                                        <?php } ?>

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

    </div>
</div>


<?php break; ?>
<?php } ?>