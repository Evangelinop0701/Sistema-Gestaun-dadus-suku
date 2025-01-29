<?php

switch ($_GET['act']) {
    case 'read':?>

<div class="container p-4">
    <div class="col-lg-12">
        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dados Users</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    dados users
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered customers py-4" id=example>
                    <thead>
                        <tr>
                            <th class="py-1">No</th>
                            <th class="py-1">Naran User</th>
                            <th class="py-1">Username</th>
                            <th class="py-1">Aasaun</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $user->dados_users();
        $no = 1;
        foreach ($data as $row) {?>
                        <tr>
                            <td class="py-1"><?= $no; ?></td>
                            <td class="py-1"><?= $row['naran_populasaun']; ?></td>
                            <td class="py-1"><?= $row['username']; ?></td>
                            <td class="py-1">
                                <?php if ($row['status_p'] == "Y") { ?>
                                <a href="modul/mod_user/aksi.php?act=reset&id=<?=$row['id_users'] ?>"
                                    class="btn btn-sm btn-warning rounded-1 py-0"><i class="fa fa-refresh"></i>
                                    Reset</a>
                                <a href="modul/mod_user/aksi.php?act=delete&id=<?=$row['id_users'] ?>"
                                    class="btn btn-sm btn-dark rounded-1 py-0"><i class="fa fa-trash"></i>
                                    Delete</a>
                                <?php } elseif ($row['status_p'] == "") { ?>
                                <a href=""
                                    class="btn btn-sm btn-danger py-0 disabled rounded-1 text-decoration-line-through"><i
                                        class="fa fa-info-circle"></i>
                                    Reset</a>
                                <a href="modul/mod_user/aksi.php?act=delete&id=<?=$row['id_users'] ?>"
                                    class="btn btn-sm btn-dark rounded-1 py-0"><i class="fa fa-trash"></i>
                                    Delete</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php $no++;
        } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<?php break;
    case 'update':
        $upus = $user->select_form_user($_GET['id']);
        ?>
<div class="container p-4">
    <div class="col-lg-3"></div>
    <div class="col-lg-7">
        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dados Users</li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Hadia dados users
                </div>
            </div>
            <div class="card-body">
                <form action="modul/mod_user/aksi.php?act=update&id=<?=$_GET['id']?>" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Naran Users<sub style="color:red;">*</sub></label>
                                <input type="" class="form-control form-control-sm"
                                    value="<?= $_SESSION['naran_populasaun']; ?>" id="" name="data_mate"
                                    aria-describedby="emailHelp" disabled>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Username<sub style="color:red;">*</sub></label>
                                <input type="text" class="form-control form-control-sm" id="" name="username"
                                    aria-describedby="emailHelp" value="<?=$upus[0]['username']?>" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Password<sub style="color:red;">*</sub></label>
                                <input type="password" class="form-control form-control-sm" id="" name="pass1"
                                    aria-describedby="emailHelp" value="<?=$upus[0]['pass1']?>" required>
                            </div>
                        </div>
                        <div class="col-12">
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
    <div class="col-lg-3"></div>

</div>
<?php break; ?>
<?php } ?>