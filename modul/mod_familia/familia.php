<?php
switch ($_GET['act']) {
    case 'read':?>

<div class="container p-4">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-6 my-2">
                <div class="card rounded-1">
                    <div class="card-header border-0 rounded-0" id="card-header">
                        <h6 class="card-title text-uppercase text-center my-2">Dados familia Kada Aldeia</h6>
                    </div>
                    <div class="card-body pt-1">
                        <table class="table table-bordered mt-2">


                            <?php

                    $data = $aldeia->dados_aldeia();
        foreach ($data as $row) {?>
                            <tr>
                                <td class="py-1 text-center"><a href="familia-aldeia-<?= $row['id_aldeia']; ?>.html"
                                        style="text-decoration:none;">Familia husi Aldeia
                                        [<?= $row['naran_aldeia'] ?>]</a></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-2">
                <div class="card rounded-1">
                    <div class="card-header border-0 rounded-0" id="card-header">
                        <h6 class="card-title text-uppercase text-center my-2">lista jeral</h6>
                    </div>
                    <div class="card-body pt-1">
                        <div class="text-center">
                            <a href="familia-jeral.html" class="btn btn-warning px-5 my-2 rounded-1"><i
                                    class="fa-solid fa-people-roof"></i>
                                Familia
                                Jeral</a><br>

                        </div>

                        <table class="mt-2 text-center">
                            <tr>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php break;
    case 'kada_aldeia':
        $id_all = $_GET['id'];

        ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dados Familia</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    <?php $al = $aldeia->dados_aldeia_id($_GET['id']); ?>
                    Dados Familia husi aldeia [ <b><u><?=$al[0]['naran_aldeia'] ?></u></b> ]
                </div>
            </div>
            <div class="card-body">
                <div class="container">


                    <table class="table table-bordered table-responsive-sm py-3 customers" id="example">
                        <thead>
                            <tr>
                                <th class="py-1 text-center">No</th>
                                <th class="py-1 text-center">Naran Chefe Familia</th>
                                <th class="py-1 text-center">No Familia</th>
                                <th class="py-1 text-center">Naran Familia</th>
                                <th class="py-1 text-center">Aldeia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php


        $fa = $familia->dados_familia_kada_aldeia($id_all);
        $total = $familia->total_familia_aldeia($id_all);
        ;
        $no = 1;
        foreach ($fa as $row) {
            ?>
                            <tr>
                                <td class="py-1"><?= $no; ?></td>
                                <td class="py-1"><a id="class" style="text-decoration:none;"
                                        href="membro-familia-<?=$row['id_familia']?>-<?=$row['id_aldeia']?>.html"><?= $row['naran_chefe']; ?></a>
                                </td>
                                <td class="py-1 text-center"><?= $row['no_familia']; ?></td>
                                <td class="py-1"><?= $row['naran_familia']; ?></td>
                                <td class="py-1"><?= $row['naran_aldeia']; ?></td>

                            </tr>
                            <?php $no++;
        } ?>
                            <!-- Add more data rows as needed -->
                        </tbody>
                        <tr>
                            <td class="py-1 text-center fw-bold" style="background-color:#c5dce4;" colspan="2">Total
                                dados Familia
                            </td>
                            <td class="py-1 text-center fw-bold" style="color:#2d7aad;"><?= $total[0]['total']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?php break;
    case 'all_familia': ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dados Familia</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Dados familia
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="table-responsive-lg">
                        <table class="table table-bordered table-responsive-sm py-3 customers" id="example">
                            <thead>
                                <tr>
                                    <th class="py-1 text-center">No</th>
                                    <th class="py-1 text-center">Naran Chefe Familia</th>
                                    <th class="py-1 text-center">No Familia</th>
                                    <th class="py-1 text-center">Naran Familia</th>
                                    <th class="py-1 text-center">Aldeia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


            $fa = $familia->all_familia();

        ;
        $no = 1;
        foreach ($fa as $row) {
            ?>
                                <tr>
                                    <td class="py-1"><?= $no; ?></td>
                                    <td class="py-1"><a id="class" style="text-decoration:none;"
                                            href="detalho-familia-<?=$row['id_familia']?>-<?=$row['id_aldeia']?>.html"><?= $row['naran_chefe']; ?></a>
                                    </td>
                                    <td class="py-1 text-center"><?= $row['no_familia']; ?></td>
                                    <td class="py-1"><?= $row['naran_familia']; ?></td>
                                    <td class="py-1"><?= $row['naran_aldeia']; ?></td>

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
<?php break; ?>
<?php } ?>