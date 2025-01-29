<?php

include "../../class/class.php";
$crud = new CRUD();
$po = new populasaun();
$db = new database();

switch ($_GET['act']) {
    case 'input':
        $arrayData = array(
             'id_populasaun' => $_POST['id_populasaun'],
             'data_mate' => $_POST['data_mate'],
             'deskrisaun' => $_POST['deskrisaun'],
    );
        $id = $_POST['id_populasaun'];

        $data = $crud->insert_data('t_mate', $arrayData);
        $po->update_status($id);


        if($data) {
            echo "<script>alert('Dados Rai ona...!')</script>";
            echo "<script>window.location='../../populasaun-mate-".$_GET['id_al'].".html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;
    case 'update':
        $id = $_GET['id'];
        $id_p = $_GET['id_p'];
        $arrayData = array(
            "id_populasaun='" . $_POST['id_populasaun'] . "'",
            "data_mate='" . $_POST['data_mate'] . "'",
            "deskrisaun='" . $_POST['deskrisaun'] . "'"

        );

        if ($id_p != $_POST['id_populasaun']) {
             $po->update_status_moris($id_p);
            $data = $crud->update_data('t_mate', $arrayData, 'id_mate', $id);
            $po->update_status($_POST['id_populasaun']);
        }else {
             $data = $crud->update_data('t_mate', $arrayData, 'id_mate', $id);
        }

       

        if($data) {
            echo "<script>alert('Hadia dados ho sucessu...!')</script>";
            echo "<script>window.location='../../populasaun-mate-".$_GET['id_aldeia'].".html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;
    case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_mate', 'id_mate', $id);
         $po->update_status_moris($_GET['id_po']);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../populasaun-mate-".$_GET['id_aldeia'].".html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;
}
