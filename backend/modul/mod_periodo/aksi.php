<?php

include "../../class/class.php";
$crud = new CRUD();
$p = new periodo();
$db = new database();

switch ($_GET['act']) {
    case 'input':
        $arrayData = array(
             'periodo' => $_POST['periodo']

    );


        $data = $crud->insert_data('t_periodo', $arrayData);
        if($data) {
            echo "<script>alert('Dados Rai ona...!')</script>";
            echo "<script>window.location='../../periodo.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;
    case 'update':
        $id = $_GET['id_p'];
        $arrayData = array(
            "periodo='" . $_POST['periodo'] . "'"
        );
        $data = $crud->update_data('t_periodo', $arrayData, 'id_periodo', $id);

        if($data) {
            echo "<script>alert('Hadia dados ho sucessu...!')</script>";
            echo "<script>window.location='../../periodo.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;
    case 'delete':
        $id = $_GET['id_p'];
        $data = $crud->delete_data('t_periodo', 'id_periodo', $id);
        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../periodo.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;
    case 'update_y':
        $id = $_GET['id_p'];
        $p->status_yes($id);
        header('location: ../../periodo.html');
        break;
}