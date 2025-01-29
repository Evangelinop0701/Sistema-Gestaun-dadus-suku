<?php
include "../../class/class.php";
$user = new user();

if (!$user->get_sessi()) {
    header('location: ../../../login.html');
}


switch ($_GET['act']) {
    case 'read':


        $fami = $familia->select_form($_GET['id']);
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
                    <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
                    <a href="input-membro-<?=$_GET['id']?>-<?=$_GET['id_aldeia']?>.html"
                        class="btn btn-sm px-2 mb-2 rounded-0 btn-success py-0"><i class="fa fa-plus-circle"></i>
                        Aumenta
                        dados</a>
                    <?php } elseif ($_SESSION['kargu'] == "Chefe do Suku") {
                        echo " ";
                    } elseif ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
                    <a href="input-membro-<?=$_GET['id']?>-<?=$_GET['id_aldeia']?>.html"
                        class="btn btn-sm px-2 mb-2 rounded-0 btn-success py-0"><i class="fa fa-plus-circle"></i>
                        Aumenta
                        dados</a>
                    <?php } else {
                        echo " ";
                    } ?>

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

                                <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
                                <th class="py-1 text-center" id="font">Aksaun</th>
                                <?php } elseif ($_SESSION['kargu'] == "Chefe do Suku") {
                                    echo " ";
                                } elseif ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
                                <th class="py-1 text-center" id="font">Aksaun</th>
                                <?php } else {
                                    echo " ";
                                } ?>
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
                                <?php if ($_SESSION['kargu'] == "Sekretaria") { ?>
                                <td class="py-1" id="font">
                                    <div class="btn-group" id="text">
                                        <button type="button" id="font"
                                            class="btn btn-warning btn-sm py-0 dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-user-gear"></i> Aksaun
                                        </button>
                                        <ul class="dropdown-menu rounded-0 text-capitalize">
                                            <li><a class="dropdown-item text-capitalize py-0"
                                                    href="update-membru-<?=$row['id_membro']?>-aldeia-<?=$_GET['id_aldeia']?>-familia-<?=$_GET['id']?>.html"
                                                    id="font"><i class="fa fa-edit"></i>
                                                    Hadia</a></li>
                                            <li><a class="dropdown-item text-capitalize py-0"
                                                    href="modul/mod_membru/aksi.php?act=delete&id_me=<?=$row['id_membro']?>&id_aldeia=<?=$_GET['id_aldeia']; ?>&id_familia=<?=$_GET['id']?>"
                                                    id="font"><i class="fa fa-trash"></i>
                                                    Hamos</a></li>
                                            <?php
                                            if ($row['obs'] == "") {?>
                                            <li><a class="dropdown-item text-capitalize py-0"
                                                    href="modul/mod_membru/aksi.php?act=obs_sai&id_me=<?=$row['id_membro']?>&id_aldeia=<?=$_GET['id_aldeia']; ?>&id_familia=<?=$_GET['id']?>"
                                                    id="font"><i class="fa fa-check"></i>
                                                    Sai</a></li>
                                            <?php } else { ?>
                                            <li><a class="dropdown-item text-capitalize py-0"
                                                    href="modul/mod_membru/aksi.php?act=obs_kansela&id_me=<?=$row['id_membro']?>&id_aldeia=<?=$_GET['id_aldeia']; ?>&id_familia=<?=$_GET['id']?>"
                                                    id="font"><i class="fa fa-remove"></i>
                                                    Kansela</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </td>
                                <?php } elseif ($_SESSION['kargu'] == "Chefe do Suku") {
                                    echo " ";
                                } elseif ($_SESSION['kargu'] == "Chefe Aldeia") { ?>
                                <td class="py-1" id="font">
                                    <div class="btn-group" id="text">
                                        <button type="button" id="font"
                                            class="btn btn-warning btn-sm py-0 dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-user-gear"></i> Aksaun
                                        </button>
                                        <ul class="dropdown-menu rounded-0 text-capitalize">
                                            <li><a class="dropdown-item text-capitalize py-0"
                                                    href="update-membru-<?=$row['id_membro']?>-aldeia-<?=$_GET['id_aldeia']?>-familia-<?=$_GET['id']?>.html"
                                                    id="font"><i class="fa fa-edit"></i>
                                                    Hadia</a></li>
                                            <li><a class="dropdown-item text-capitalize py-0"
                                                    href="modul/mod_membru/aksi.php?act=delete&id_me=<?=$row['id_membro']?>&id_aldeia=<?=$_GET['id_aldeia']; ?>&id_familia=<?=$_GET['id']?>"
                                                    id="font"><i class="fa fa-trash"></i>
                                                    Hamos</a></li>
                                            <?php
                        if ($row['obs'] == "") {?>
                                            <li><a class="dropdown-item text-capitalize py-0"
                                                    href="modul/mod_membru/aksi.php?act=obs_sai&id_me=<?=$row['id_membro']?>&id_aldeia=<?=$_GET['id_aldeia']; ?>&id_familia=<?=$_GET['id']?>"
                                                    id="font"><i class="fa fa-check"></i>
                                                    Sai</a></li>
                                            <?php } else { ?>
                                            <li><a class="dropdown-item text-capitalize py-0"
                                                    href="modul/mod_membru/aksi.php?act=obs_kansela&id_me=<?=$row['id_membro']?>&id_aldeia=<?=$_GET['id_aldeia']; ?>&id_familia=<?=$_GET['id']?>"
                                                    id="font"><i class="fa fa-remove"></i>
                                                    Kansela</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </td>
                                <?php } else {
                                    echo " ";
                                } ?>

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
    case 'input': ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="familia-aldeia-<?=$_GET['id_aldeia']?>.html">Dados Familia</a></li>
            <li class="breadcrumb-item"><a href="membro-familia-<?=$_GET['id']?>-<?=$_GET['id_aldeia']?>.html">Menbru
                    Familia</a></li>
            <li class="breadcrumb-item active">Aumenta Membru </li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Aumenta dados Membru
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <form
                        action="modul/mod_membru/aksi.php?act=input&id_fa=<?=$_GET['id']?>&id_aldeia=<?=$_GET['id_aldeia']?>"
                        method="POST">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Naran Membru<sub style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="naran_membro"
                                        aria-describedby="emailHelp" placeholder="Prense naran membro" required>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Data Moris<sub style="color:red;">*</sub></label>
                                    <input type="date" class="form-control form-control-sm" id="" name="data_moris"
                                        aria-describedby="emailHelp" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Fatin Moris<sub style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="fatin_moris"
                                        aria-describedby="emailHelp" placeholder="Prense Fatin Moris" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Sexu<sub style="color:red;">*</sub></label>
                                    <select name="sexu" class="form-control form-control-sm" id="" required>
                                        <option value="M">Mane</option>
                                        <option value="F">Feto</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Relasaun Familia<sub
                                            style="color:red;"></sub></label>
                                    <select name="relasaun_famili" class="form-control form-control-sm" id="">
                                        <option value="" selected hidden>Hili Relasaun Familia</option>
                                        <option value="Aman">Aman</option>
                                        <option value="Inan">Inan</option>
                                        <option value="Oan Mane">Oan Mane</option>
                                        <option value="Oan Feto">Oan Feto</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Relasaun Seluk<sub
                                            style="color:red;"></sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="relasaun_seluk"
                                        aria-describedby="emailHelp" placeholder="Relasaun Seluk">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Estado Sivil<sub style="color:red;">*</sub></label>
                                    <select name="estadu_civil" class="form-control form-control-sm" id="" required>
                                        <option value="Kassadu">Kassadu</option>
                                        <option value="Solteiro">Solteiro</option>
                                        <option value="Barlakeadu">Barlakeadu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Porfisaun<sub style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="knar"
                                        aria-describedby="emailHelp" placeholder="Prense Profisaun" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Religiaun<sub style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="religiaun"
                                        aria-describedby="emailHelp" placeholder="Prense Religiaun" required>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="mb-3">
                                    <label for="" class="form-label">Abilidade<sub style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="abilidade"
                                        aria-describedby="emailHelp" placeholder="Prense Abilidade" required>
                                </div>
                            </div>

                            <?php $no_fa = $familia->select_form($_GET['id']);?>
                            <input type="hidden" value="<?= $no_fa[0]['id_familia']; ?>" name="id_familia">

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
        $up_m = $membru->select_form($_GET['id_m']);
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

            <li class="breadcrumb-item"><a
                    href="membro-familia-<?=$_GET['id_familia']?>-<?=$_GET['id_aldeia']?>.html">Menbru
                    Familia</a></li>
            <li class="breadcrumb-item active">Hadia Membru </li>
        </ol>
        <div class="card rounded-1 shadow-sm" id="card">
            <div class="card-header rounded-0" id="card-header">
                <div class="card-title my-0 text-uppercase">
                    Hadia dados Membru
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <form
                        action="modul/mod_membru/aksi.php?act=update&id_m=<?=$_GET['id_m']?>&id_aldeia=<?=$_GET['id_aldeia']?>&id_familia=<?=$_GET['id_familia']?>"
                        method="POST">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Naran Membru<sub style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="naran_membro"
                                        aria-describedby="emailHelp" value="<?= $up_m[0]['naran_membro']; ?>"
                                        placeholder="Prense naran membro" required>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Data Moris<sub style="color:red;">*</sub></label>
                                    <input type="date" class="form-control form-control-sm" id="" name="data_moris"
                                        aria-describedby="emailHelp" value="<?= $up_m[0]['data_moris']; ?>" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Fatin Moris<sub style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="fatin_moris"
                                        aria-describedby="emailHelp" value="<?= $up_m[0]['fatin_moris']; ?>"
                                        placeholder="Prense Fatin Moris" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Sexu<sub style="color:red;">*</sub></label>
                                    <select name="sexu" class="form-control form-control-sm" id="" required>
                                        <option value="<?= $up_m[0]['sexu']; ?>" selected hidden>
                                            <?php if ($up_m[0]['sexu'] == "M") {
                                                echo "Mane";
                                            } else {
                                                echo "Feto";
                                            } ?>
                                        </option>
                                        <option value="M">Mane</option>
                                        <option value="F">Feto</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Relasaun Familia<sub
                                            style="color:red;"></sub></label>
                                    <select name="relasaun_famili" class="form-control form-control-sm" id="">
                                        <option value="<?= $up_m[0]['relasaun_famili']; ?>" selected hidden>
                                            <?= $up_m[0]['relasaun_famili']; ?>
                                        </option>
                                        <option value="Aman">Aman</option>
                                        <option value="Inan">Inan</option>
                                        <option value="Oan Mane">Oan Mane</option>
                                        <option value="Oan Feto">Oan Feto</option>
                                        <option value="">Seluk...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Relasaun Seluk<sub
                                            style="color:red;"></sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="relasaun_seluk"
                                        aria-describedby="emailHelp" value="<?= $up_m[0]['relasaun_seluk']; ?>"
                                        placeholder="Relasaun Seluk">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Estado Sivil<sub style="color:red;">*</sub></label>
                                    <select name="estadu_civil" class="form-control form-control-sm" id="" required>
                                        <option value="<?= $up_m[0]['estadu_civil']; ?>" selected hidden>
                                            <?= $up_m[0]['estadu_civil']; ?></option>
                                        <option value="Kassadu">Kassadu</option>
                                        <option value="Solteiro">Solteiro</option>
                                        <option value="Barlakeadu">Barlakeadu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Porfisaun<sub style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="knar"
                                        aria-describedby="emailHelp" value="<?= $up_m[0]['knar']; ?>"
                                        placeholder="Prense Profisaun" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Religiaun<sub style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="religiaun"
                                        aria-describedby="emailHelp" value="<?= $up_m[0]['religiaun']; ?>"
                                        placeholder="Prense Religiaun" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Abilidade<sub style="color:red;">*</sub></label>
                                    <input type="text" class="form-control form-control-sm" id="" name="abilidade"
                                        aria-describedby="emailHelp" value="<?= $up_m[0]['abilidade']; ?>"
                                        placeholder="Prense Abilidade" required>
                                </div>
                            </div>
                            <input type="hidden" value="<?= $up_m[0]['id_familia']; ?>" name="id_familia">

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
                    <a href="" class="btn btn-sm btn-danger my-2 px-2"><i class="fa fa-print"></i> IPRIMIR</a>
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
    case 'ficha_familia':
        $fami = $familia->select_form($_GET['id']);
        ?>
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
                                <th class="py-1">Asaun</th>
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
                                <td class="py-1">
                                    <a href="modul/print_dokument/print_familia.php?act=familia_kada&id=<?=$row['id_familia'] ?>&id_a=<?=$row['id_aldeia'] ?>"
                                        class="btn btn-sm btn-danger py-0"><i class="fa fa-print"></i>
                                        Imprimir</a>
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
</div>
<?php break;
    case 'detalho_ficha':
        $fami = $familia->select_form($_GET['id']);
        ?>
<div class="container p-4">


    <div class="col-lg-12">

        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="ficha-familia.html">Ficha Familia</a></li>
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