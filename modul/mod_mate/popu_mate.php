<?php
switch ($_GET['act']) {
    case 'mate_kada':
        
 ?>
<div class="container p-4">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-md-6">
                <div class="card rounded-1">
                    <div class="card-header border-0 rounded-0" id="card-header">
                        <h6 class="card-title text-uppercase text-center my-2">Dados Populasaun mate Kada Aldeia</h6>
                    </div>
                    <div class="card-body pt-1">
                        <table class="table table-bordered mt-2">


                            <?php

                    $data = $aldeia->dados_aldeia();
        foreach ($data as $row) {?>
                            <tr>
                                <td class="py-1 text-center"><a href="populasaun-mate-<?= $row['id_aldeia']; ?>.html"
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
<?php break;  case 'read':?>

<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dados Mate</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    <?php $al = $aldeia->dados_aldeia_id($_GET['id']); ?>
                    Dados Populasaun Mate husi aldeia [ <b><u><?=$al[0]['naran_aldeia'] ?></u></b> ]
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

                                <!-- Add other columns as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                                   $p_mate = $popu_mate->dados_populasaun_mate($_GET['id']);
        $no = 1;
        foreach ($p_mate as $row) {
            ?>
                            <tr>
                                <td class="py-1"><?= $no; ?></td>
                                <td class="py-1"><a id="class" style="text-decoration:none;"
                                        href="detalho-populasaun-<?=$row['id_mate']?>.html"><?= $row['naran_populasaun']; ?></a>
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