<?php

include "../../class/class.php";
$crud = new CRUD();

$popu = new populasaun();


$act = $_GET['act'];

switch ($act) {
    case 'input':
        $valid = $popu->id_unique($_POST['no_eleitoral']);
        if ($valid > 0) {

            echo "<script>alert('Numeru eleitoral " . $_POST['no_eleitoral'] . " duplikasaun...!')</script>";
            echo "<script>window.location='../../input-popu.html'</script>";

        } else {
            $arrayData = array(
                  'no_eleitoral' => $_POST['no_eleitoral'],
                  'naran_populasaun' => $_POST['naran_populasaun'],
                  'sexu' => $_POST['sexu'],
                  'data_moris' => $_POST['data_moris'],
                  'id_aldeia' => $_POST['id_aldeia'],
                  'religiaun' => $_POST['religiaun'],
                  's_civil' => $_POST['s_civil'],
                  'profisaun' => $_POST['profisaun'],
                  'residensia_atual' => $_POST['residensia_atual'],
                  'status' => $_POST['status'],
    );

            $data = $crud->insert_data('t_populasaun', $arrayData);


            if($data) {
                if ($_POST['status'] == "Mate") {

                    echo "<script>alert('Dados Rai ona...!')</script>";
                    echo "<script>window.location='../../populasaun-mate.html'</script>";

                } else {
                    echo "<script>alert('Dados Rai ona...!')</script>";
                    echo "<script>window.location='../../dados-populasaun-" . $_POST['id_aldeia'] . ".html'</script>";
                }
            } else {
                echo "<script>alert('ERROR!')</script>";
            }
            break;
        }
        // no break
    case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_populasaun', 'id_populasaun', $id);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../populasaun.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: populasaun.html');
        }
        break;
    case 'update':
        $id = $_GET['id'];
        $arrayData = array(
            "no_eleitoral='" . $_POST['no_eleitoral'] . "'",
            "naran_populasaun='" . $_POST['naran_populasaun'] . "'",
            "sexu='" . $_POST['sexu'] . "'",
            "data_moris='" . $_POST['data_moris'] . "'",
            "id_aldeia='" . $_POST['id_aldeia'] . "'",
            "religiaun='" . $_POST['religiaun'] . "'",
            "s_civil='" . $_POST['s_civil'] . "'",
            "profisaun='" . $_POST['profisaun'] . "'",
            "residensia_atual='" . $_POST['residensia_atual'] . "'",
            "status='" . $_POST['status'] . "'"
        );

        $data = $crud->update_data('t_populasaun', $arrayData, 'id_populasaun', $id);

        if($data) {
            if ($_POST['status'] == "Mate") {

                echo "<script>alert('Hadia dados ho sucessu...!')</script>";
                echo "<script>window.location='../../populasaun-mate.html'</script>";

            } else {
                echo "<script>alert('Hadia dados ho sucessu...!')</script>";
                echo "<script>window.location='../../dados-populasaun-" . $_POST['id_aldeia'] . ".html'</script>";
            }
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;
        break;
}
