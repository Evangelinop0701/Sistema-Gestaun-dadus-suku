<?php
switch ($_GET['act']) {
    case 'read':?>

<div class="container p-4">
    <div class="row">
        <div class="col-12">
            <ol class="breadcrumb rounded-1 px-2 py-1">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Relatorio</li>
            </ol>
        </div>
        <div class="col-sm-6">

            <div class="card p-4 shadow-lg my-2">

                <div class="card rounded-1 shadow-sm text-lg-center" id="card">
                    <div class="card-header rounded-0" id="card-header">
                        <div class="card-title my-0 text-uppercase">
                            <span class="fw-bold text-secondary" style="font-size:12px;">
                                Relatorio dados populasaun
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td class="py-1">
                                    <a href="lista-populasaun.html" class="text-decoration-none"><span
                                            style='font-size:12px;' class="fw-bold">&#8920;</span> Lista Populasaun
                                        Jeral <span style='font-size:12px;' class="fw-bold">&#8921;</span></a>
                                </td>
                            </tr>
                            <?php

                        $ald = $aldeia->dados_aldeia_id($_SESSION['id_aldeia']);
        if (@$_SESSION['kargu'] == "Sekretaria" | @$_SESSION['level_user'] == "superadmin" | @$_SESSION['kargu'] == "Chefe do Suku") {
            $data = $aldeia->dados_aldeia();
            foreach ($data as $row) {?>
                            <tr>
                                <td class="py-1">
                                    <a class="text-decoration-none"
                                        href="lista-aldeia-<?= $row['id_aldeia']; ?>.html"><span style='font-size:12px;'
                                            class="fw-bold">&#8920;</span> Lista Populasaun aldeia
                                        <?= $row['naran_aldeia'] ?> <span style='font-size:12px;'
                                            class="fw-bold">&#8921;</span>
                                    </a>
                                </td>

                            </tr>
                            <?php } ?>
                            <?php } elseif (@$_SESSION['kargu'] == "Chefe Aldeia") {
                                $alde = $aldeia->dados_aldeia_id($_SESSION['id_aldeia']);
                                ?>
                            <td class="py-1">
                                <a class="text-decoration-none" href="lista-aldeia-<?= $row['id_aldeia']; ?>.html"><span
                                        style='font-size:12px;' class="fw-bold">&#8920;</span> Lista Populasaun aldeia
                                    <?=  $alde[0]['naran_aldeia'] ?> <span style='font-size:12px;'
                                        class="fw-bold">&#8921;</span>
                                </a>
                            </td>
                            <?php } ?>
                        </table>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-sm-6">

            <div class="card p-4 shadow-lg my-2">

                <div class="card rounded-1 shadow-sm text-lg-center" id="card">
                    <div class="card-header rounded-0 bg-warning" id="card-header">
                        <div class="card-title my-0 text-uppercase">
                            <span class="fw-bold text-secondary" style="font-size:12px;">
                                Relatorio dados familia
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td class="py-1">
                                    <a href="lista-familia.html" class="text-decoration-none"><span
                                            style='font-size:12px;' class="fw-bold">&#8920;</span> Lista Familia
                                        Jeral <span style='font-size:12px;' class="fw-bold">&#8921;</span></a>
                                </td>
                            </tr>
                            <?php

                            if (@$_SESSION['kargu'] == "Sekretaria" | @$_SESSION['level_user'] == "superadmin" | @$_SESSION['kargu'] == "Chefe do Suku") {

                                $data = $aldeia->dados_aldeia();
                                foreach ($data as $row) {?>
                            <tr>
                                <td class="py-1">
                                    <a class="text-decoration-none"
                                        href="lista-familia-aldeia-<?= $row['id_aldeia']; ?>.html"><span
                                            style='font-size:12px;' class="fw-bold">&#8920;</span> Lista Familia aldeia
                                        <?= $row['naran_aldeia'] ?>
                                        <span style='font-size:12px;' class="fw-bold">&#8921;</span></a>
                                </td>

                            </tr>
                            <?php } ?>
                            <?php } elseif (@$_SESSION['kargu'] == "Chefe Aldeia") {

                                ?>
                            <td class="py-1">
                                <a class="text-decoration-none"
                                    href="lista-familia-aldeia-<?= $ald[0]['id_aldeia']; ?>.html"><span
                                        style='font-size:12px;' class="fw-bold">&#8920;</span> Lista Familia aldeia
                                    <?= $ald[0]['naran_aldeia'] ?>
                                    <span style='font-size:12px;' class="fw-bold">&#8921;</span></a>
                            </td>
                            <?php } ?>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php break;
    case 'lista_populasaun': ?>
<div class="container p-4">
    <div class="row">
        <div class="col-12">
            <ol class="breadcrumb rounded-1 px-2 py-1">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="relatorio.html">Relatorio</a></li>
                <li class="breadcrumb-item active">Relatorio Jeral</li>
            </ol>
        </div>
        <div class="col-sm-12">
            <div class="card p-4 shadow-lg my-2">
                <div class="card rounded-1 shadow-sm" id="card">
                    <div class="card-header rounded-0" id="card-header">
                        <div class="card-title my-0 text-uppercase">
                            <span class="fw-bold text-secondary" style="font-size:12px;">
                                Relatorio dados populasaun
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="modul/print_dokument/popu_jeral.php?act=lista_popu"
                            class="btn btn-sm rounded-1 btn-danger my-2"><i class="fa fa-print"></i> PDF</a>
                        <div class="table-responsive-lg">
                            <table class="table table-bordered table-responsive-sm">
                                <tr>
                                    <th class="py-1">No</th>
                                    <th class="py-1">Naran Populasaun </th>
                                    <th class="py-1">Sexu</th>
                                    <th class="py-1">Data Moris</th>
                                    <th class="py-1">Estado Sivil</th>
                                    <th class="py-1">Profisaun</th>
                                    <th class="py-1">Aldeia</th>
                                    <th class="py-1">Residensia Atual</th>
                                </tr>
                                <?php

                            $po = $populasaun->dados_populasaun();
        $no = 1;

        foreach ($po as $row) {?>
                                <tr>
                                    <td class="pt-1"><?=$no; ?></td>
                                    <td class="pt-1"><?=$row['naran_populasaun']; ?></td>
                                    <td class="pt-1"><?=$row['sexu']; ?></td>
                                    <td class="pt-1"><?=$row['data_moris']; ?></td>
                                    <td class="pt-1"><?=$row['s_civil']; ?></td>
                                    <td class="pt-1"><?=$row['profisaun']; ?></td>
                                    <td class="pt-1"><?=$row['naran_aldeia']; ?></td>
                                    <td class="pt-1"><?=$row['residensia_atual']; ?></td>
                                </tr>
                                <?php $no++;
        } ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php break;
    case 'lista_aldeia':
        $popu_aldeia = $populasaun->popu_ativos($_GET['id_a']);
        ?>
<div class="container p-4">
    <div class="row">
        <div class="col-12">
            <ol class="breadcrumb rounded-1 px-2 py-1">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="relatorio.html">Relatorio</a></li>
                <li class="breadcrumb-item active">Relatorio aldeia <?=$popu_aldeia[0]['naran_aldeia'] ?></li>
            </ol>
        </div>
        <div class="col-sm-12">

            <div class="card p-4 shadow-lg my-2">

                <div class="card rounded-1 shadow-sm" id="card">
                    <div class="card-header rounded-0" id="card-header">
                        <div class="card-title my-0 text-uppercase">
                            <span class="fw-bold text-secondary" style="font-size:12px;">
                                Relatorio dados populasaun <?= $popu_aldeia[0]['naran_aldeia'] ?>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="modul/print_dokument/popu_jeral.php?act=lista_kada&id_a=<?=$_GET['id_a']?>"
                            class="btn btn-sm rounded-1 btn-danger my-2"><i class="fa fa-print"></i> PDF</a>
                        <div class="table-responsive-lg">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="py-1">No</th>
                                    <th class="py-1">Naran Populasaun </th>
                                    <th class="py-1">Sexu</th>
                                    <th class="py-1">Data Moris</th>
                                    <th class="py-1">Estado Sivil</th>
                                    <th class="py-1">Profisaun</th>
                                    <th class="py-1">Aldeia</th>
                                    <th class="py-1">Residensia Atual</th>
                                </tr>
                                <?php


                                        $no = 1;

        foreach ($popu_aldeia as $row) {?>
                                <tr>
                                    <td class="pt-1"><?=$no; ?></td>
                                    <td class="pt-1"><?=$row['naran_populasaun']; ?></td>
                                    <td class="pt-1"><?=$row['sexu']; ?></td>
                                    <td class="pt-1"><?=$row['data_moris']; ?></td>
                                    <td class="pt-1"><?=$row['s_civil']; ?></td>
                                    <td class="pt-1"><?=$row['profisaun']; ?></td>
                                    <td class="pt-1"><?=$row['naran_aldeia']; ?></td>
                                    <td class="pt-1"><?=$row['residensia_atual']; ?></td>
                                </tr>
                                <?php $no++;
        } ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php break;
    case 'lista_familia': ?>
<div class="container p-4">
    <div class="row">
        <div class="col-12">
            <ol class="breadcrumb rounded-1 px-2 py-1">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="relatorio.html">Relatorio</a></li>
                <li class="breadcrumb-item active">Familia Jeral</li>
            </ol>
        </div>
        <div class="col-sm-12">

            <div class="card p-4 shadow-lg my-2">

                <div class="card rounded-1 shadow-sm" id="card">
                    <div class="card-header rounded-0" id="card-header">
                        <div class="card-title my-0 text-uppercase">
                            <span class="fw-bold text-secondary" style="font-size:12px;">
                                Relatorio Familia Jeral
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="modul/print_dokument/print_familia.php?act=familia_jeral"
                            class="btn btn-sm rounded-1 btn-danger my-2"><i class="fa fa-print"></i> PDF</a>
                        <div class="table-responsive-lg">
                            <table class="table customers">
                                <tr>
                                    <th class="py-1">No</th>
                                    <th class="py-1">Naran Chefe Familia</th>
                                    <th class="py-1">Numero Familia</th>
                                    <th class="py-1">Aldeia</th>
                                </tr>
                                <?php

                            $fam = $familia->familia_jeral();
        $no = 1;

        foreach ($fam as $row) {?>
                                <tr>
                                    <td class="pt-1"><?=$no; ?></td>
                                    <td class="pt-1"><?=$row['naran_chefe']; ?></td>
                                    <td class="pt-1"><?=$row['no_familia']; ?></td>
                                    <td class="pt-1"><?=$row['naran_aldeia']; ?></td>
                                </tr>
                                <?php $no++;
        } ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-sm-12">

            <div class="card p-4 shadow-lg my-2">

                <div class="card rounded-1 shadow-sm" id="card">
                    <div class="card-header rounded-0 bg-warning" id="card-header">
                        <div class="card-title my-0 text-uppercase">
                            <span class="fw-bold text-secondary" style="font-size:12px;">
                                Ficha Familia
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-lg">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="py-1">No</th>
                                    <th class="py-1">Naran Chefe Familia</th>
                                    <th class="py-1">Numero Familia</th>
                                    <th class="py-1">Aldeia</th>
                                    <th class="py-1">Asaun</th>
                                </tr>
                                <?php

                $fam = $familia->familia_jeral();
        $no = 1;

        foreach ($fam as $row) {?>
                                <tr>
                                    <td class="pt-1"><?=$no; ?></td>
                                    <td class="pt-1"><?=$row['naran_chefe']; ?></td>
                                    <td class="pt-1"><?=$row['no_familia']; ?></td>
                                    <td class="pt-1"><?=$row['naran_aldeia']; ?></td>
                                    <td class="pt-1">
                                        <a href="" class="btn btn-sm py-0 btn-success"><i
                                                class="fa fa-file-pdf"></i></a>
                                    </td>
                                </tr>
                                <?php $no++;
        } ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php break;
    case 'familia_aldeia':
        $alf = $familia->familia_aldeia($_GET['id_a']);
        ?>

<div class="container p-4">
    <div class="row">
        <div class="col-12">
            <ol class="breadcrumb rounded-1 px-2 py-1">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="relatorio.html">Relatorio</a></li>
                <li class="breadcrumb-item active">Familia aldeia <?=$alf[0]['naran_aldeia'] ?></li>
            </ol>
        </div>
        <div class="col-sm-12">

            <div class="card p-4 shadow-lg my-2">

                <div class="card rounded-1 shadow-sm" id="card">
                    <div class="card-header rounded-0" id="card-header">
                        <div class="card-title my-0 text-uppercase">
                            <span class="fw-bold text-secondary" style="font-size:12px;">
                                Relatorio Familia aldeia <?=$alf[0]['naran_aldeia'] ?>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="modul/print_dokument/print_familia.php?act=familia_aldeia_jeral&id_a=<?=$_GET['id_a']?>"
                            class="btn btn-sm rounded-1 btn-danger my-2"><i class="fa fa-print"></i> PDF</a>
                        <div class="table-responsive-lg">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="py-1">No</th>
                                    <th class="py-1">Naran Chefe Familia</th>
                                    <th class="py-1">Numero Familia</th>
                                    <th class="py-1">Aldeia</th>
                                </tr>
                                <?php


                                                $no = 1;

        foreach ($alf as $row) {?>
                                <tr>
                                    <td class="pt-1"><?=$no; ?></td>
                                    <td class="pt-1"><?=$row['naran_chefe']; ?></td>
                                    <td class="pt-1"><?=$row['no_familia']; ?></td>
                                    <td class="pt-1"><?=$row['naran_aldeia']; ?></td>
                                </tr>
                                <?php $no++;
        } ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-sm-12">

            <div class="card p-4 shadow-lg my-2">

                <div class="card rounded-1 shadow-sm" id="card">
                    <div class="card-header rounded-0 bg-warning" id="card-header">
                        <div class="card-title my-0 text-uppercase">
                            <span class="fw-bold text-secondary" style="font-size:12px;">
                                Ficha familia aldeia <?=$alf[0]['naran_aldeia'] ?>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-lg">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="py-1">No</th>
                                    <th class="py-1">Naran Chefe Familia</th>
                                    <th class="py-1">Numero Familia</th>
                                    <th class="py-1">Aldeia</th>
                                    <th class="py-1">Asaun</th>
                                </tr>
                                <?php


        $no = 1;

        foreach ($alf as $row) {?>
                                <tr>
                                    <td class="pt-1"><?=$no; ?></td>
                                    <td class="pt-1"><?=$row['naran_chefe']; ?></td>
                                    <td class="pt-1"><?=$row['no_familia']; ?></td>
                                    <td class="pt-1"><?=$row['naran_aldeia']; ?></td>
                                    <td class="pt-1">
                                        <a href="modul/print_dokument/print_familia.php?act=familia_kada&id=<?=$row['id_familia']?>&id_a=<?=$row['id_aldeia']?>"
                                            class="btn btn-sm py-0 btn-success"><i class="fa fa-file-pdf"></i></a>
                                    </td>
                                </tr>
                                <?php $no++;
        } ?>
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