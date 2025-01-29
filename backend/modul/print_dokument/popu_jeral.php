<!DOCTYPE html>
<?php
error_reporting(8.2);
include "../../class/class.php";
include "../../class/lib.php";

$db = new database();

$populasaun = new populasaun();

?>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="../../.assets/css/bootstrap.min.css"> -->
    <style>
    * {
        margin: 5px;
        padding: 5px;
        padding-left: 2px;
    }

    .customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .customers td,
    .customers th {
        border: 1px solid #ddd;
        padding: 8px;
        font-size: 12px;
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
    <div class="container"><br>
        <?php
    switch ($_GET['act']) {
        case 'lista_popu': ?>
        <table class="customers">
            <tr>
                <th colspan="10" class="py-2">
                    <center>DADOS POPULASAUN ATIVOS</center>
                </th>
            </tr>
            <tr>
                <td colspan="10">
                    <div class="row">
                        <div class="col-md-5">
                            <table class="customers">
                                <tr>
                                    <th class="py-0">Date</th>
                                    <td class="py-0"><?= date("Y-m-d", strtotime("+6 HOURS"));?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
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
        <?php break;
        case 'lista_kada':
            $popu_aldeia = $populasaun->popu_ativos($_GET['id_a']);
            ?>
        <table class="customers">
            <tr>
                <th colspan="10" class="py-2">
                    <center>DADOS POPULASAUN ATIVOS ALDEIA <span
                            style="text-transform: uppercase;"><?=$popu_aldeia[0]['naran_aldeia'] ?></span>
                    </center>
                </th>
            </tr>
            <tr>
                <td colspan="10">
                    <div class="row">
                        <div class="col-md-5">
                            <table class="customers">
                                <tr>
                                    <th class="py-0">Date</th>
                                    <td class="py-0"><?= date("Y-m-d", strtotime("+6 HOURS"));?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
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
        <?php break; ?>
        <?php } ?>

        <br><br>
    </div>
    <center>
        <button id="PrintButton" class="btn btn-sm btn-danger" onclick="PrintPage()">Imprimir</button>
    </center>
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