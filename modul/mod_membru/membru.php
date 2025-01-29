<?php

switch ($_GET['act']) {
    case 'read':


        $fami = $familia->select_form($_GET['id']);
        ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="familia-aldeia-<?=$_GET['id_aldeia']?>.html">Dados Familia</a></li>
            <li class="breadcrumb-item active">Menbru Familia</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Membru husi Familia [<b><u><?= $fami[0]['naran_chefe']; ?></u></b>] ninian
                </div>
            </div>
            <div class="card-body">
                <div class="container">


                    <div class="card rounded-0">
                        <div class="card-body">
                            <h2 class="text-uppercase text-center  py-0">
                                kartaun rejistu uma kain (ficha familia)
                            </h2>
                        </div>
                    </div>

                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <table class="table my-2">
                                        <tr>
                                            <td>
                                                <h5>Munisipiu</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['naran_mun']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Postu</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['naran_postu']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Suku</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['naran_suku']; ?></h5>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-2 text-center">
                                    <img src="foto_familia/<?= $fami[0]['foto'] ?>" class="img-thumbnail rounded-0"
                                        style="width:150px; height:180px;" alt="...">
                                </div>
                                <div class="col-6">
                                    <table class="table my-2">
                                        <tr>
                                            <td>
                                                <h5>No Ficha Familia</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['no_familia']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Xefe Familia</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['naran_chefe']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Aldeia</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['naran_aldeia']; ?></h5>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered table-responsive-sm py-3">
                        <thead>
                            <tr class="txt">
                                <th class="py-1 text-center" id="font">No</th>
                                <th class="py-1 text-center" id="font">Naran</th>
                                <th class="py-1 text-center" id="font">Sexu</th>
                                <th class="py-1 text-center" id="font">Relasaun Familia</th>
                                <th class="py-1 text-center" id="font">Fatin Moris</th>
                                <th class="py-1 text-center" id="font">Data Moris</th>
                                <th class="py-1 text-center" id="font">Estadu Civil</th>
                                <th class="py-1 text-center" id="font">Profisaun</th>
                                <th class="py-1 text-center" id="font">Relijiaun</th>
                                <th class="py-1 text-center" id="font">Abilitasaun Literaria</th>
                                <th class="py-1 text-center" id="font">Obs</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $mem = $membru->membru_familia($_GET['id']);

        $no = 1;

        foreach ($mem as $row) { ?>
                            <tr class="text">
                                <td class="py-1" id="font"><?= $no; ?></td>
                                <td class="py-1" id="font"><?= $row['naran_membro']; ?></td>
                                <td class="py-1" id="font"><?= $row['sexu']; ?></td>
                                <td class="py-1" id="font">
                                    <?php
                                        if ($row['relasaun_famili'] == "") {
                                            echo $row['relasaun_seluk'];
                                        } else {
                                            if ($row['relasaun_famili'] == "Aman") {
                                                echo "Chefe da Familia";
                                            } else {

                                                echo $row['relasaun_famili'];

                                            }
                                        }
            ?>
                                </td>
                                <td class="py-1" id="font"><?= $row['fatin_moris']; ?></td>
                                <td class="py-1" id="font"><?= $row['data_moris']; ?></td>
                                <td class="py-1" id="font"><?= $row['estadu_civil']; ?></td>
                                <td class="py-1" id="font"><?= $row['knar']; ?></td>
                                <td class="py-1" id="font"><?= $row['religiaun']; ?></td>
                                <td class="py-1" id="font"><?= $row['abilidade']; ?></td>
                                <td class="py-1" id="font"><?= $row['obs'] ?></td>

                            </tr>
                            <?php $no++;
        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?php break;
    case 'familia_jeral': ?>
<div class="container p-4">
    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Familia Jeral</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Familia Jeral
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table table-bordered table-responsive-sm py-3 customers" id="example">
                        <thead>
                            <tr>
                                <th class="py-1">No</th>
                                <th class="py-1">Naran Chefe Familia</th>
                                <th class="py-1">Numeru Ficha Familia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $lista_jeral = $familia->familia_jeral();
        $no = 1;
        foreach ($lista_jeral as $row) {?>
                            <tr>
                                <td class="py-1"><?=$no; ?></td>
                                <td class="py-1"><a
                                        href="detalho-ficha-<?=$row['id_familia'] ?>-<?=$row['id_aldeia'] ?>.html"
                                        style="text-decoration:none;"><?=$row['naran_chefe']; ?></a>
                                </td>
                                <td class="py-1"><?=$row['no_familia']; ?></td>
                            </tr>
                            <?php $no++;
        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?php break;
    case 'ficha_familia': ?>
<div class="container p-4">
    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Ficha Familia</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    imprime ficha familia
                </div>
            </div>
            <div class="card-body">
                <div class="container col-10">
                    <table class="table table-bordered table-responsive-sm py-3 customers" id="example">
                        <thead>
                            <tr>
                                <th class="py-1">No</th>
                                <th class="py-1">Naran Chefe Familia</th>
                                <th class="py-1">Numeru Ficha Familia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $lista_jeral = $familia->familia_jeral();
        $no = 1;
        foreach ($lista_jeral as $row) {?>
                            <tr>
                                <td class="py-1"><?=$no; ?></td>
                                <td class="py-1"><a
                                        href="detalho-ficha-<?=$row['id_familia'] ?>-<?=$row['id_aldeia'] ?>.html"
                                        style="text-decoration:none;"><?=$row['naran_chefe']; ?></a>
                                </td>
                                <td class="py-1"><?=$row['no_familia']; ?></td>

                            </tr>
                            <?php $no++;
        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?php break;
    case 'detalho_ficha':
        $fami = $familia->select_form($_GET['id']);
        ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Detalho Ficha Familia</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Membru husi Familia [<b><u><?= $fami[0]['naran_chefe']; ?></u></b>] ninian
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <h2 class="text-uppercase text-center  py-0">
                                kartaun rejistu uma kain (ficha familia)
                            </h2>
                        </div>
                    </div>

                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <table class="table my-2">
                                        <tr>
                                            <td>
                                                <h5>Munisipiu</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['naran_mun']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Postu</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['naran_postu']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Suku</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['naran_suku']; ?></h5>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-2 text-center">
                                    <img src="foto_familia/<?= $fami[0]['foto'] ?>" class="img-thumbnail rounded-0"
                                        style="width:150px; height:180px;" alt="...">
                                </div>
                                <div class="col-6">
                                    <table class="table my-2">
                                        <tr>
                                            <td>
                                                <h5>No Ficha Familia</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['no_familia']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Xefe Familia</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['naran_chefe']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Aldeia</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['naran_aldeia']; ?></h5>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered table-responsive-sm py-3">
                        <thead>
                            <tr class="txt">
                                <th class="py-1 text-center" id="font">No</th>
                                <th class="py-1 text-center" id="font">Naran</th>
                                <th class="py-1 text-center" id="font">Sexu</th>
                                <th class="py-1 text-center" id="font">Relasaun Familia</th>
                                <th class="py-1 text-center" id="font">Fatin Moris</th>
                                <th class="py-1 text-center" id="font">Data Moris</th>
                                <th class="py-1 text-center" id="font">Estadu Civil</th>
                                <th class="py-1 text-center" id="font">Profisaun</th>
                                <th class="py-1 text-center" id="font">Relijiaun</th>
                                <th class="py-1 text-center" id="font">Abilitasaun Literaria</th>
                                <th class="py-1 text-center" id="font">Obs</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                    $mem = $membru->membru_familia($_GET['id']);

        $no = 1;

        foreach ($mem as $row) { ?>
                            <tr class="text">
                                <td class="py-1" id="font"><?= $no; ?></td>
                                <td class="py-1" id="font"><?= $row['naran_membro']; ?></td>
                                <td class="py-1" id="font"><?= $row['sexu']; ?></td>
                                <td class="py-1" id="font">
                                    <?php
                                        if ($row['relasaun_famili'] == "") {
                                            echo $row['relasaun_seluk'];
                                        } else {
                                            if ($row['relasaun_famili'] == "Aman") {
                                                echo "Chefe da Familia";
                                            } else {

                                                echo $row['relasaun_famili'];

                                            }
                                        }
            ?>
                                </td>
                                <td class="py-1" id="font"><?= $row['fatin_moris']; ?></td>
                                <td class="py-1" id="font"><?= $row['data_moris']; ?></td>
                                <td class="py-1" id="font"><?= $row['estadu_civil']; ?></td>
                                <td class="py-1" id="font"><?= $row['knar']; ?></td>
                                <td class="py-1" id="font"><?= $row['religiaun']; ?></td>
                                <td class="py-1" id="font"><?= $row['abilidade']; ?></td>
                                <td class="py-1" id="font"><?= $row['obs'] ?></td>

                            </tr>
                            <?php $no++;
        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<?php break;
    case 'prense_ficha': ?>
<div class="container p-4">
    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Ficha Familia</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    ficha familia
                </div>
            </div>
            <div class="card-body">
                <div class="container col-10">
                    <table class="table table-bordered table-responsive-sm py-3 customers" id="example">
                        <thead>
                            <tr>
                                <th class="py-1">No</th>
                                <th class="py-1">Naran Chefe Familia</th>
                                <th class="py-1">Numeru Ficha Familia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $lista_jeral = $familia->familia_jeral();
        $no = 1;
        foreach ($lista_jeral as $row) {?>
                            <tr>
                                <td class="py-1"><?=$no; ?></td>
                                <td class="py-1"><a
                                        href="membro-familia-<?=$row['id_familia'] ?>-<?=$row['id_aldeia'] ?>.html"
                                        style="text-decoration:none;"><?=$row['naran_chefe']; ?></a>
                                </td>
                                <td class="py-1"><?=$row['no_familia']; ?></td>
                            </tr>
                            <?php $no++;
        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?php break;
    case 'detalho_familia':
        $fami = $familia->select_form($_GET['id']);
        ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Detalho Familia</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Membru husi Familia [<b><u><?= $fami[0]['naran_chefe']; ?></u></b>] ninian
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <h2 class="text-uppercase text-center  py-0">
                                kartaun rejistu uma kain (ficha familia)
                            </h2>
                        </div>
                    </div>

                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <table class="table my-2">
                                        <tr>
                                            <td>
                                                <h5>Munisipiu</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['naran_mun']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Postu</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['naran_postu']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Suku</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['naran_suku']; ?></h5>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-2 text-center">
                                    <img src="foto_familia/<?= $fami[0]['foto'] ?>" class="img-thumbnail rounded-0"
                                        style="width:150px; height:180px;" alt="...">
                                </div>
                                <div class="col-6">
                                    <table class="table my-2">
                                        <tr>
                                            <td>
                                                <h5>No Ficha Familia</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['no_familia']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Xefe Familia</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['naran_chefe']; ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Aldeia</h5>
                                            </td>
                                            <td></td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $fami[0]['naran_aldeia']; ?></h5>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered table-responsive-sm py-3">
                        <thead>
                            <tr class="txt">
                                <th class="py-1 text-center" id="font">No</th>
                                <th class="py-1 text-center" id="font">Naran</th>
                                <th class="py-1 text-center" id="font">Sexu</th>
                                <th class="py-1 text-center" id="font">Relasaun Familia</th>
                                <th class="py-1 text-center" id="font">Fatin Moris</th>
                                <th class="py-1 text-center" id="font">Data Moris</th>
                                <th class="py-1 text-center" id="font">Estadu Civil</th>
                                <th class="py-1 text-center" id="font">Profisaun</th>
                                <th class="py-1 text-center" id="font">Relijiaun</th>
                                <th class="py-1 text-center" id="font">Abilitasaun Literaria</th>
                                <th class="py-1 text-center" id="font">Obs</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                        $memb = $membru->membru_familia($_GET['id']);

        $no = 1;

        foreach ($memb as $row) { ?>
                            <tr class="text">
                                <td class="py-1" id="font"><?= $no; ?></td>
                                <td class="py-1" id="font"><?= $row['naran_membro']; ?></td>
                                <td class="py-1" id="font"><?= $row['sexu']; ?></td>
                                <td class="py-1" id="font">
                                    <?php
                                        if ($row['relasaun_famili'] == "") {
                                            echo $row['relasaun_seluk'];
                                        } else {
                                            if ($row['relasaun_famili'] == "Aman") {
                                                echo "Chefe da Familia";
                                            } else {

                                                echo $row['relasaun_famili'];

                                            }
                                        }
            ?>
                                </td>
                                <td class="py-1" id="font"><?= $row['fatin_moris']; ?></td>
                                <td class="py-1" id="font"><?= $row['data_moris']; ?></td>
                                <td class="py-1" id="font"><?= $row['estadu_civil']; ?></td>
                                <td class="py-1" id="font"><?= $row['knar']; ?></td>
                                <td class="py-1" id="font"><?= $row['religiaun']; ?></td>
                                <td class="py-1" id="font"><?= $row['abilidade']; ?></td>
                                <td class="py-1" id="font"><?= $row['obs'] ?></td>

                            </tr>
                            <?php $no++;
        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?php break; ?>
<?php } ?>