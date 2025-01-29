<!DOCTYPE html>
<?php
error_reporting(8.2);
include "../../class/class.php";
include "../../class/lib.php";

$db = new database();

$populasaun = new populasaun();
$familia = new familia();
$estrutura = new estrutura();
$membru = new membru();


$fami = $familia->select_form($_GET['id']);
$chefe_aldeia = $estrutura->ficha($_GET['id_a']);
$chefe_suku = $estrutura->ficha_chefe($_GET['id_a']);



?>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <style>
    * {}

    .customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .customers td,
    .customers th {
        border: 1px solid #ddd;
        padding: 8px;
        font-size: 14px;
    }


    .customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .customers tr:hover {
        background-color: #ddd;
    }

    .customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        /* text-align: center; */
        /* background-color: #04AA6D; */
        /* color: white; */
    }


    @media print {
        #print {
            display: none;
        }
    }

    @media print {
        #PrintButton {
            display: none;
        }
    }

    @page {
        size: auto;
        /* auto is the initial value */
        margin: 0;
        /* this affects the margin in the printer settings */
    }
    </style>
</head>

<body>
    <div class="container-fluid px-5"><br>
        <?php
    switch ($_GET['act']) {
        case 'familia_jeral': ?>
        <table class="table customers">
            <tr>
                <th colspan="10" class="py-2">
                    <center>DADUS FAMILIA JERAL</center>
                </th>
            </tr>
            <tr>
                <td colspan="10">
                    <div class="row">
                        <div class="col-md-5">
                            <table class="customers">
                                <tr>
                                    <th class="py-0">Data</th>
                                    <td class="py-0"><?= date("Y-m-d", strtotime("+6 HOURS"));?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
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
            <tr>
                <td class="pt-2"><?=$no; ?></td>
                <td class="pt-2"><?=$row['naran_chefe']; ?></td>
                <td class="pt-2"><?=$row['no_familia']; ?></td>
                <td class="pt-2"><?=$row['naran_aldeia']; ?></td>
            </tr>
            </tr>
            <?php $no++;
            } ?>
        </table>


        <?php break;
        case 'familia_kada':

            $mem = $membru->membru_familia($_GET['id']);

            ?>
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
                        <img src="../../foto_familia/<?= $fami[0]['foto'] ?>" class="img-thumbnail rounded-0"
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
        <table class="customers">
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
        </table>

        <div class="row mt-4">
            <div class="col-3 text-center">
                <span class="">Chefe do Familia</span>
                <div class="mt-3">
                    (<u class="fw-bold"><?= $fami[0]['naran_chefe']; ?></u>)
                    <p><i>Naran no Asinatura</i></p>
                </div>
            </div>
            <div class="col-3 text-center">
                <span class="" text-center>Chefe Aldeia</span>
                <div class="mt-3">
                    (<u class="fw-bold"><?= $chefe_aldeia[0]['naran_populasaun']; ?></u>)
                    <p><i>Naran no Asinatura</i></p>
                </div>
            </div>
            <div class="col-3 text-center">
                <?php  ?>
                <span class="">Chefe do Suku</span>
                <div class="mt-3">
                    (<u class="fw-bold"><?= $chefe_suku[0]['naran_populasaun']; ?></u>)
                    <p><i>Naran no Asinatura</i></p>
                </div>
            </div>
            <div class="col-3 text-center">
                <span class="">Visto pelo Adm. do Postu</span>
                <div class="mt-3">
                    (<span class="fw-bold">................................................</span>)
                    <p><i>Naran no Asinatura</i></p>
                </div>
            </div>
        </div>
        <?php break;
        case 'familia_aldeia_jeral': ?>
        <table class="table customers">
            <tr>
                <th colspan="10" class="py-2">
                    <center>DADUS FAMILIA JERAL</center>
                </th>
            </tr>
            <tr>
                <td colspan="10">
                    <div class="row">
                        <div class="col-md-5">
                            <table class="customers">
                                <tr>
                                    <th class="py-0">Data</th>
                                    <td class="py-0"><?= date("Y-m-d", strtotime("+6 HOURS"));?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th class="py-1">No</th>
                <th class="py-1">Naran Chefe Familia</th>
                <th class="py-1">Numero Familia</th>
                <th class="py-1">Aldeia</th>
                <th class="py-1"></th>
                <th class="py-1"></th>
                <th class="py-1"></th>
                <th class="py-1"></th>
            </tr>
            <?php


                $fam = $familia->familia_aldeia($_GET['id_a']);

            $no = 1;

            foreach ($fam as $row) {?>
            <tr>
            <tr>
                <td class="pt-2"><?=$no; ?></td>
                <td class="pt-2"><?=$row['naran_chefe']; ?></td>
                <td class="pt-2"><?=$row['no_familia']; ?></td>
                <td class="pt-2"><?=$row['naran_aldeia']; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tr>
            <?php $no++;
            } ?>
        </table>
        <?php break; ?>
        <?php } ?>

        <br><br>
    </div>
    <center>
        <button id="PrintButton" class="btn btn-sm btn-danger" onclick="PrintPage()">Imprimir</button>
    </center>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../../assets/js/scripts.js"></script>
</body>
<script type="text/javascript">
function PrintPage() {
    window.print();
}
document.loaded = function() {

}
window.addEventListener('DOMContentLoaded', (event) => {
    PrintPage()
    setTimeout(function() {
        window.close()
    }, 750)
});
</script>

</html>