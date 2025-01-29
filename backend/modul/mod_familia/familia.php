<?php
switch ($_GET['act']) {
    case 'read':?>

<?php if ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
<div class="container p-4">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-8 my-2">
                <div class="card rounded-1">
                    <div class="card-header border-0 rounded-0" id="card-header">
                        <h6 class="card-title text-uppercase text-center my-2">Dados familia Aldeia
                            [<b><?= $_SESSION['naran_aldeia'] ?></b>]</h6>
                    </div>
                    <div class="card-body pt-1">
                        <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
                        <a href="input-familia-<?=$_GET['id']?>.html" class="btn btn-sm px-2 mb-2 btn-success py-1"><i
                                class="fa fa-plus-circle"></i> Aumenta
                            dados</a>
                        <?php } elseif ($_SESSION['kargu'] == "Chefe do Suku") {
                            echo " ";
                        } elseif ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
                        <a href="input-familia-<?=$_SESSION['id_aldeia']?>.html"
                            class="btn btn-sm px-2 mb-2 btn-success py-1"><i class="fa fa-plus-circle"></i> Aumenta
                            dados</a>
                        <?php } else {
                            echo " ";
                        } ?>
                        <div class="table-responsive-lg">
                            <table class="table table-bordered table-responsive-sm py-3 customers" id="example">
                                <thead>
                                    <tr>
                                        <th class="py-1 text-center">No</th>
                                        <th class="py-1 text-center">Naran Chefe Familia</th>
                                        <th class="py-1 text-center">No Familia</th>
                                        <th class="py-1 text-center">Naran Familia</th>
                                        <th class="py-1 text-center">Aldeia</th>
                                        <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
                                        <th class="py-1 text-center">Aksaun</th>
                                        </td>
                                        <?php } elseif ($_SESSION['kargu'] == "Chefe do Suku") {
                                            echo " ";
                                        } elseif ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
                                        <th class="py-1 text-center">Aksaun</th>
                                        </td>
                                        <?php } else {
                                            echo " ";
                                        } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


        $fa = $familia->dados_familia_kada_aldeia($_SESSION['id_aldeia']);
    $total = $familia->total_familia_aldeia($_SESSION['id_aldeia']);
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
                                        <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
                                        <td class="py-1">
                                            <a href="update-familia-<?=$row['id_familia']?>-<?=$row['id_aldeia']?>.html"
                                                class="btn btn-sm py-0 btn-primary "><i class="fa fa-edit"></i>
                                                Hadia</a>
                                            <a href="modul/mod_familia/aksi.php?act=delete&id=<?=$row['id_familia'];?>&id_aldeia=<?=$row['id_aldeia']?>&file=<?=$row['foto']?>"
                                                class="btn btn-sm py-0 btn-danger "><i class="fa fa-trash"></i>
                                                Delete</a>
                                        </td>
                                        <?php } elseif ($_SESSION['kargu'] == "Chefe do Suku") {
                                            echo " ";
                                        } elseif ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
                                        <td class="py-1">
                                            <a href="update-familia-<?=$row['id_familia']?>-<?=$row['id_aldeia']?>.html"
                                                class="btn btn-sm py-0 btn-primary "><i class="fa fa-edit"></i>
                                            </a>
                                            <a href="modul/mod_familia/aksi.php?act=delete&id=<?=$row['id_familia'];?>&id_aldeia=<?=$row['id_aldeia']?>&file=<?=$row['foto']?>"
                                                class="btn btn-sm py-0 btn-danger "><i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                        <?php } else {
                                            echo " ";
                                        } ?>
                                    </tr>
                                    <?php $no++;
    } ?>
                                    <!-- Add more data rows as needed -->
                                </tbody>
                                <tr>
                                    <td class="py-1 text-center fw-bold" style="background-color:#c5dce4;" colspan="2">
                                        Total
                                        dados Familia
                                    </td>
                                    <td class="py-1 text-center fw-bold" style="color:#2d7aad;">
                                        <?= $total[0]['total']; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card rounded-1">
                    <div class="card-header border-0 rounded-0" id="card-header">
                        <h6 class="card-title text-uppercase text-center my-2">ficha familia aldeia
                            [<b><?= $_SESSION['naran_aldeia'] ?></b>]</h6>
                    </div>
                    <div class="card-body pt-1">
                        <div class="text-center">
                            <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
                            <a href="prense-ficha.html" class="btn btn-info px-5 my-2 rounded-1"><i
                                    class="fa-solid fa-book"></i>
                                Prense Ficha</a><br>
                            <?php } elseif ($_SESSION['kargu'] == "Chefe do Suku") {
                                echo " ";
                            } elseif ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
                            <a href="prense-ficha.html" class="btn btn-info px-5 my-2 rounded-1"><i
                                    class="fa-solid fa-book"></i>
                                Prense Ficha</a><br>
                            <?php } else {
                                echo " ";
                            } ?>
                            <a href="ficha-familia.html" class="btn btn-success px-5 my-2 rounded-1"><i
                                    class="fa-solid fa-gear"></i>
                                Ficha
                                Familia</a>

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
<?php } else { ?>
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


                            <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
                            <a href="prense-ficha.html" class="btn btn-info px-5 my-2 rounded-1"><i
                                    class="fa-solid fa-book"></i>
                                Prense Ficha</a><br>
                            <?php } elseif ($_SESSION['kargu'] == "Chefe do Suku") {
                                echo " ";
                            } elseif ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
                            <a href="prense-ficha.html" class="btn btn-info px-5 my-2 rounded-1"><i
                                    class="fa-solid fa-book"></i>
                                Prense Ficha</a><br>
                            <?php } else {
                                echo " ";
                            } ?>
                            <a href="ficha-familia.html" class="btn btn-success px-5 my-2 rounded-1"><i
                                    class="fa-solid fa-gear"></i>
                                Ficha
                                Familia</a>

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
<?php } ?>



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

                    <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
                    <a href="input-familia-<?=$_GET['id']?>.html" class="btn btn-sm px-2 mb-2 btn-success py-1"><i
                            class="fa fa-plus-circle"></i> Aumenta
                        dados</a>
                    <?php } elseif ($_SESSION['kargu'] == "Chefe do Suku") {
                        echo " ";
                    } elseif ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
                    <a href="input-familia-<?=$_GET['id']?>.html" class="btn btn-sm px-2 mb-2 btn-success py-1"><i
                            class="fa fa-plus-circle"></i> Aumenta
                        dados</a>
                    <?php } else {
                        echo " ";
                    } ?>
                    <div class="table-responsive-lg">
                        <table class="table table-bordered table-responsive-sm py-3 customers" id="example">
                            <thead>
                                <tr>
                                    <th class="py-1 text-center">No</th>
                                    <th class="py-1 text-center">Naran Chefe Familia</th>
                                    <th class="py-1 text-center">No Familia</th>
                                    <th class="py-1 text-center">Naran Familia</th>
                                    <th class="py-1 text-center">Aldeia</th>
                                    <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
                                    <th class="py-1 text-center">Aksaun</th>
                                    </td>
                                    <?php } elseif ($_SESSION['kargu'] == "Chefe do Suku") {
                                        echo " ";
                                    } elseif ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
                                    <th class="py-1 text-center">Aksaun</th>
                                    </td>
                                    <?php } else {
                                        echo " ";
                                    } ?>
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
                                    <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
                                    <td class="py-1">
                                        <a href="update-familia-<?=$row['id_familia']?>-<?=$row['id_aldeia']?>.html"
                                            class="btn btn-sm py-0 btn-primary "><i class="fa fa-edit"></i>
                                            Hadia</a>
                                        <a href="modul/mod_familia/aksi.php?act=delete&id=<?=$row['id_familia'];?>&id_aldeia=<?=$row['id_aldeia']?>&file=<?=$row['foto']?>"
                                            class="btn btn-sm py-0 btn-danger "><i class="fa fa-trash"></i>
                                            Delete</a>
                                    </td>
                                    <?php } elseif ($_SESSION['kargu'] == "Chefe do Suku") {
                                        echo " ";
                                    } elseif ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
                                    <td class="py-1">
                                        <a href="update-familia-<?=$row['id_familia']?>-<?=$row['id_aldeia']?>.html"
                                            class="btn btn-sm py-0 btn-primary "><i class="fa fa-edit"></i>
                                            Hadia</a>
                                        <a href="modul/mod_familia/aksi.php?act=delete&id=<?=$row['id_familia'];?>&id_aldeia=<?=$row['id_aldeia']?>&file=<?=$row['foto']?>"
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
                            <tr>
                                <td class="py-1 text-center fw-bold" style="background-color:#c5dce4;" colspan="2">Total
                                    dados Familia
                                </td>
                                <td class="py-1 text-center fw-bold" style="color:#2d7aad;"><?= $total[0]['total']; ?>
                                </td>
                            </tr>
                        </table>
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
            <?php if ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
            <li class="breadcrumb-item"><a href="familia.html">Dados Familia</a></li>
            <?php } else { ?>
            <li class="breadcrumb-item"><a href="familia-aldeia-<?=$_GET['id']?>.html">Dados Familia</a></li>
            <?php } ?>
            <li class="breadcrumb-item active">Aumenta dados Populasaun Mate</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Aumenta dados Familia
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <form action="modul/mod_familia/aksi.php?act=input" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nu. Familia<sub style="color:red;">*</sub></label>
                                    <input type="number" class="form-control form-control-sm" id="" name="no_familia"
                                        aria-describedby="emailHelp" placeholder="Prense Nu Familia" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Naran Familia<sub
                                            style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="naran_familia"
                                        aria-describedby="emailHelp" placeholder="Prense Naran Familia" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Naran Chefe Familia<sub
                                            style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="naran_chefe"
                                        aria-describedby="emailHelp" placeholder="Prense Naran Chefe Familia" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Aldeia<sub style="color:red;">*</sub></label>
                                    <select name="id_aldeia" class="form-control form-control-sm" required>
                                        <!-- <option value="" selected hidden>Hili naran Populasaun</option> -->
                                        <?php
                                        $al = $aldeia->dados_aldeia();
        foreach ($al as $row) { ?>
                                        <option value="<?= $row['id_aldeia']; ?>">Aldeia
                                            <?=$row['naran_aldeia'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Foto<sub style="color:red;"></sub></label>
                                    <input type="file" class="form-control form-control-sm" name='f_upload'>
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
        $up = $familia->select_form($_GET['id'])
        ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <?php if ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
            <li class="breadcrumb-item"><a href="familia.html">Dados Familia</a></li>
            <?php } else { ?>
            <li class="breadcrumb-item"><a href="familia-aldeia-<?=$_GET['id_aldeia']?>.html">Dados Familia</a></li>

            <?php } ?>
            <li class="breadcrumb-item active">Hadia dados Familia</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Aumenta dados Familia
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <form action="modul/mod_familia/aksi.php?act=update&id=<?=$_GET['id']?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nu. Familia<sub style="color:red;">*</sub></label>
                                    <input type="text" value="<?= $up[0]['no_familia']; ?>"
                                        class="form-control form-control-sm" id="" name="no_familia"
                                        aria-describedby="emailHelp" placeholder="Prense Nu Familia" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Naran Familia<sub
                                            style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm"
                                        value="<?= $up[0]['naran_familia']; ?>" id="" name="naran_familia"
                                        aria-describedby="emailHelp" placeholder="Prense Naran Familia" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Naran Chefe Familia<sub
                                            style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm"
                                        value="<?= $up[0]['naran_chefe']; ?>" id="" name="naran_chefe"
                                        aria-describedby="emailHelp" placeholder="Prense Naran Chefe Familia" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Aldeia<sub style="color:red;">*</sub></label>
                                    <select name="id_aldeia" class="form-control form-control-sm" required>
                                        <option value="<?= $up[0]['id_aldeia']; ?>" selected hidden>
                                            Aldeia <?= $up[0]['naran_aldeia']  ?></option>
                                        <?php
                                            $al = $aldeia->dados_aldeia();
        foreach ($al as $row) { ?>
                                        <option value="<?= $row['id_aldeia']; ?>">Aldeia
                                            <?=$row['naran_aldeia'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Foto<sub style="color:red;"></sub></label>
                                    <input type="hidden" value="<?= $up[0]['foto']; ?>" name='foto'>
                                    <input type="file" class="form-control form-control-sm" name='f_upload'>
                                    <img src="foto_familia/<?= $up[0]['foto'] ?>" class="img-thumbnail my-2"
                                        style="width:100px; heigth:50px;" alt="...">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-sm btn-success px-3"><i
                                            class="fa fa-check-circle"></i> Hadia</button>
                                    <button type="reset" onclick="self.history.back()"
                                        class="btn btn-sm btn-danger px-3"><i class="fa-solid fa-arrows-rotate"></i>
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