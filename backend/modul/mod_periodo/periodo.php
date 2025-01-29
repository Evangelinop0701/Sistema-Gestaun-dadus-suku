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
                <div class="container">

                    <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
                    <a href="input-periodo.html" class="btn btn-sm px-2 mb-2 btn-success py-1"><i
                            class="fa fa-plus-circle"></i> Aumenta
                        dados</a>
                    <?php } elseif ($_SESSION['kargu'] == "Chefe do Suku") {
                        echo " ";
                    } elseif ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
                    <a href="input-periodo.html" class="btn btn-sm px-2 mb-2 btn-success py-1"><i
                            class="fa fa-plus-circle"></i> Aumenta
                        dados</a>
                    <?php } else {
                        echo " ";
                    } ?>

                    <table class="table table-bordered table-responsive-sm py-3" id="">
                        <thead>
                            <tr>
                                <th class="py-1">No</th>
                                <th class="py-1">Periodo</th>
                                <th class="py-1 text-center">Ativasaun</th>
                                <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
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

                                                   $per = $periodo->periodo();
        $no = 1;
        foreach ($per as $row) {
            ?>
                            <tr>
                                <td class="py-1"><?= $no; ?></td>
                                <td class="py-1"><?= $row['periodo']; ?></td>
                                <td class="py-1 text-center"><?php
                                    if ($row['status_p'] == "") {?>
                                    <a href="modul/mod_periodo/aksi.php?act=update_y&id_p=<?=$row['id_periodo'];?>"
                                        class="btn btn-sm"><i class="fa fa-remove text-danger"></i></a>
                                    <?php } else { ?>
                                    <i class="fa fa-check-circle text-success"></i>
                                    <?php } ?>
                                </td>
                                <?php if ($_SESSION['kargu'] == "Sekretaria" | $_SESSION['level_user'] == "superadmin") { ?>
                                <td class="py-1">
                                    <a href="hadia-periodo-<?=$row['id_periodo']?>.html"
                                        class="btn btn-sm py-0 btn-primary "><i class="fa fa-edit"></i>
                                        Hadia</a>
                                    <a href="modul/mod_periodo/aksi.php?act=delete&id_p=<?=$row['id_periodo'];?>"
                                        class="btn btn-sm py-0 btn-danger "><i class="fa fa-trash"></i>
                                        Delete</a>
                                </td>
                                <?php } elseif ($_SESSION['kargu'] == "Chefe do Suku") {
                                    echo " ";
                                } elseif ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
                                <td class="py-1">
                                    <a href="hadia-periodo-<?=$row['id_periodo']?>.html"
                                        class="btn btn-sm py-0 btn-primary "><i class="fa fa-edit"></i>
                                        Hadia</a>
                                    <a href="modul/mod_estrutura/aksi.php?act=delete&id=<?=$row['id_periodo'];?>"
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
    case 'input': ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="periodo.html">Periodo</a></li>
            <li class="breadcrumb-item active">Aumenta dados Periodo</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Aumenta Periodo
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <form action="modul/mod_periodo/aksi.php?act=input" method="POST">
                        <div class="row">

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Periodo<sub style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="periodo"
                                        aria-describedby="emailHelp" required>
                                </div>
                            </div>

                            <div class="col-4 my-3">
                                <div class="my-3">
                                    <label for="" class="form-label"></label>
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

        $up_p = $periodo->periodo_id($_GET['id_p']);

        ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="periodo.html">Periodo</a></li>
            <li class="breadcrumb-item active">Hadia dados Periodo</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Hadia Periodo
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <form action="modul/mod_periodo/aksi.php?act=update&id_p=<?= @$_GET['id_p']?>" method="POST">
                        <div class="row">

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Periodo<sub style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm"
                                        value="<?=$up_p[0]['periodo']?>" name="periodo" aria-describedby="emailHelp"
                                        required>
                                </div>
                            </div>

                            <div class="col-4 my-3">
                                <div class="my-3">
                                    <label for="" class="form-label"></label>
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
<?php break; ?>
<?php } ?>