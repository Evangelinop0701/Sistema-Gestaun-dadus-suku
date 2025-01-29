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
<?php break;
    case 'read':?>

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

                    <?php if ($_SESSION['kargu'] == "Sekretaria" | $_SESSION['level_user'] == "superadmin") { ?>
                    <a href="input-populasaun-mate-<?=$_GET['id']?>.html"
                        class="btn btn-sm px-2 mb-2 btn-success py-1"><i class="fa fa-plus-circle"></i> Aumenta
                        dados</a>
                    <?php } elseif ($_SESSION['kargu'] == "Chefe do Suku") {
                        echo " ";
                    } elseif ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
                    <a href="input-populasaun-mate-<?=$_GET['id']?>.html"
                        class="btn btn-sm px-2 mb-2 btn-success py-1"><i class="fa fa-plus-circle"></i> Aumenta
                        dados</a>
                    <?php } else {
                        echo " ";
                    } ?>

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
                                <?php if ($_SESSION['kargu'] == "Sekretaria" | $_SESSION['level_user'] == "superadmin") { ?>
                                <th class="py-1">Aksaun</th>
                                <?php } elseif ($_SESSION['kargu'] == "Chefe do Suku") {
                                    echo " ";
                                } elseif ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
                                <th class="py-1">Aksaun</th>
                                <?php } else {
                                    echo " ";
                                } ?>
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
                                        href="detalho-mate-<?=$row['id_mate']?>-aldeia-<?=$row['id_aldeia']?>.html"><?= $row['naran_populasaun']; ?></a>
                                </td>
                                <td class="py-1"><?= $row['sexu']; ?></td>
                                <td class="py-1"><?= $row['naran_suku']; ?></td>
                                <td class="py-1"><?= $row['naran_aldeia']; ?></td>
                                <td class="py-1"><?= convert_tinan($row['data_moris'], $row['data_mate']) ?> Anos</td>
                                <td class="py-1"><?= $row['status']; ?></td>
                                <?php if ($_SESSION['kargu'] == "Sekretaria" | $_SESSION['level_user'] == "superadmin") { ?>
                                <td class="py-1">
                                    <a href="update-popu-mate-<?=$row['id_mate']?>-<?=$row['id_populasaun']?>-<?=$row['id_aldeia'] ?>.html"
                                        class="btn btn-sm py-0 btn-primary "><i class="fa fa-edit"></i>
                                        Hadia</a>
                                    <a href="modul/mod_mate/aksi.php?act=delete&id=<?=$row['id_mate'];?>&id_po=<?=$row['id_populasaun']?>&id_aldeia=<?=$row['id_aldeia'] ?>"
                                        class="btn btn-sm py-0 btn-danger "><i class="fa fa-trash"></i>
                                        Delete</a>
                                </td>
                                <?php } elseif ($_SESSION['kargu'] == "Chefe do Suku") {
                                    echo " ";
                                } elseif ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
                                <td class="py-1">
                                    <a href="update-popu-mate-<?=$row['id_mate']?>-<?=$row['id_populasaun']?>-<?=$row['id_aldeia'] ?>.html"
                                        class="btn btn-sm py-0 btn-primary "><i class="fa fa-edit"></i>
                                        Hadia</a>
                                    <a href="modul/mod_mate/aksi.php?act=delete&id=<?=$row['id_mate'];?>&id_po=<?=$row['id_populasaun']?>&id_aldeia=<?=$row['id_aldeia'] ?>"
                                        class="btn btn-sm py-0 btn-danger "><i class="fa fa-trash"></i>
                                        Delete</a>
                                </td>
                                <?php } else {
                                    echo " ";
                                } ?>

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
    case 'input_mate':
        ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="populasaun-mate-<?=$_GET['id_al']?>.html">Dados Mate</a></li>
            <li class="breadcrumb-item active">Aumenta dados Populasaun Mate</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Aumenta dados Populasaun Mate
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <form action="modul/mod_mate/aksi.php?act=input&id_al=<?=$_GET['id_al']?>" method="POST">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Naran Populasaun Mate<sub
                                            style="color:red;">*</sub></label>
                                    <select name="id_populasaun" class="form-control form-control-sm" required>
                                        <option value="" selected hidden>Hili naran Populasaun</option>
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
                                    <label for="" class="form-label">Data Mate<sub style="color:red;">*</sub></label>
                                    <input type="date" class="form-control form-control-sm" id="" name="data_mate"
                                        aria-describedby="emailHelp" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Deskrisaun<sub style="color:red;">*</sub></label>
                                    <textarea name="deskrisaun" class="form-control form-control-sm" id="" cols="30"
                                        rows="6" required></textarea>
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
        $up_mate = $popu_mate->detalho_populasaun_mate($_GET['id']);
        ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="populasaun-mate-<?=$_GET['id_aldeia']?>.html">Dados Mate</a></li>
            <li class="breadcrumb-item active">Hadia dados Populasaun Mate</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Hadia dados Populasaun Mate
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <form
                        action="modul/mod_mate/aksi.php?act=update&id=<?=$_GET['id']; ?>&id_p=<?=$_GET['id_p']; ?>&id_aldeia=<?=$_GET['id_aldeia'];?>"
                        method="POST">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Naran Populasaun Mate<sub
                                            style="color:red;">*</sub></label>
                                    <select name="id_populasaun" class="form-control form-control-sm" required>
                                        <option value="<?= $up_mate[0]['id_populasaun']; ?>" selected hidden>
                                            <?= $up_mate[0]['naran_populasaun'] ?></option>
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
                                    <label for="" class="form-label">Data Mate<sub style="color:red;">*</sub></label>
                                    <input type="date" value="<?= $up_mate[0]['data_mate']; ?>"
                                        class="form-control form-control-sm" id="" name="data_mate"
                                        aria-describedby="emailHelp" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Deskrisaun<sub style="color:red;">*</sub></label>
                                    <textarea name="deskrisaun" class="form-control form-control-sm" id="" cols="30"
                                        rows="6" required><?= $up_mate[0]['deskrisaun']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-sm btn-success px-3"><i
                                            class="fa fa-check-circle"></i> Hadia</button>
                                    <button type="reset" class="btn btn-sm btn-danger px-3"><i
                                            class="fa-solid fa-arrows-rotate" onclick="self.history.back();"></i>
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
    case 'detalho_mate':

        $dt_popu_mate = $popu_mate->detalho_populasaun_mate($_GET['id_p']);

        ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <?php if ($_SESSION['kargu'] == "Sekretaria" | $_SESSION['kargu'] == "Chefe do Suku" | $_SESSION['level_user'] == "superadmin") { ?>
            <li class="breadcrumb-item"><a href="populasaun-mate-<?=$_GET['id_a'] ?>.html">Dados
                    Populasaun Mate</a>
            </li>
            <?php } else {?>
            <li class="breadcrumb-item"><a href="populasaun-mate-<?=$_SESSION['id_aldeia'] ?>.html">Dados
                    Populasaun Mate</a></li>
            <?php } ?>
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
<?php break; ?>
<?php } ?>