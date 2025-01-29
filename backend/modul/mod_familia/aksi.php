<?php

error_reporting();
include "../../class/class.php";
$db = new database();
$crud = new CRUD();

switch ($_GET['act']) {
    case 'input':
        $lokasi_file    = $_FILES['f_upload']['tmp_name'];
        $tipe_file      = $_FILES['f_upload']['type'];
        $nama_file      = $_FILES['f_upload']['name'];

        $wite_list = ['jpg','jpeg','png'];
        $extensi = explode('.', $nama_file);
        $extensi = strtolower(end($extensi));
        $name_file_unik = "IMG-" . uniqid() . "." . $extensi;


        if (!empty($lokasi_file)) {
            if (!in_array($extensi, $wite_list)) {

                echo "<script>alert('File laos ho extensaun " . $extensi . " laos Imagen...!')</script>";
                echo "<script>window.location='../../familia-aldeia-" . $_POST['id_aldeia'] . ".html'</script>";
                return false;

            } else {
                move_uploaded_file($lokasi_file, '../../foto_familia/' . $name_file_unik);
                $arrayData = array(
                    'no_familia' => $_POST['no_familia'],
                    'naran_familia' => $_POST['naran_familia'],
                    'naran_chefe' => $_POST['naran_chefe'],
                    'foto' => $name_file_unik,
                    'id_aldeia' => $_POST['id_aldeia']
                );
                $data = $crud->insert_data('t_familia', $arrayData);

                if($data) {
                    echo "<script>alert('Dados Rai ona...!')</script>";
                    echo "<script>window.location='../../familia-aldeia-" . $_POST['id_aldeia'] . ".html'</script>";
                } else {
                    echo "<script>alert('ERROR!')</script>";
                }


            }
        } else {

            $foto = " ";


            $arrayData = array(
                                'no_familia' => $_POST['no_familia'],
                                'naran_familia' => $_POST['naran_familia'],
                                'naran_chefe' => $_POST['naran_chefe'],
                                'foto' => $name_file_unik,
                                'id_aldeia' => $_POST['id_aldeia']
                            );

            $data = $crud->insert_data('t_familia', $arrayData);

            if($data) {
                echo "<script>alert('Dados Rai ona...!')</script>";
                echo "<script>window.location='../../familia-aldeia-" . $_POST['id_aldeia'] . ".html'</script>";

            } else {
                echo "<script>alert('ERROR!')</script>";
            }

        }
        break;
    case 'update':
        $id = $_GET['id'];
        $lokasi_file    = $_FILES['f_upload']['tmp_name'];
        $tipe_file      = $_FILES['f_upload']['type'];
        $nama_file      = $_FILES['f_upload']['name'];

        $wite_list = ['jpg','jpeg','png'];
        $extensi = explode('.', $nama_file);
        $extensi = strtolower(end($extensi));
        $name_file_unik = "IMG-" . uniqid() . "." . $extensi;



        $foto = $_POST['foto'];

        if (empty($lokasi_file)) {
            $arrayData = array(
                 "no_familia='" . $_POST['no_familia'] . "'",
                 "naran_familia='" . $_POST['naran_familia'] . "'",
                 "naran_chefe='" . $_POST['naran_chefe'] . "'",
                 "foto='" . $foto . "'",
                 "id_aldeia='" . $_POST['id_aldeia'] . "'"


            );
            $data = $crud->update_data('t_familia', $arrayData, 'id_familia', $id);

            if($data) {
                echo "<script>alert('Hadia dodos ho sucessu...!')</script>";
                echo "<script>window.location='../../familia-aldeia-" . $_POST['id_aldeia'] . ".html'</script>";

            } else {
                echo "<script>alert('ERROR!')</script>";
            }
        } else {

            $del = $_POST['foto'];
            if (!empty($del)) {
                unlink("../../foto_familia/$del");
                if (!in_array($extensi, $wite_list)) {
                    echo "<script>alert('File laos ho extensaun " . $extensi . " laos Imagen...!')</script>";
                    echo "<script>window.location='../../familia-aldeia-" . $_POST['id_aldeia'] . ".html'</script>";
                } else {
                    move_uploaded_file($lokasi_file, '../../foto_familia/' . $name_file_unik);
                    $arrayData = array(
                                        "no_familia='" . $_POST['no_familia'] . "'",
                                        "naran_familia='" . $_POST['naran_familia'] . "'",
                                        "naran_chefe='" . $_POST['naran_chefe'] . "'",
                                        "foto='" . $name_file_unik . "'",
                                        "id_aldeia='" . $_POST['id_aldeia'] . "'"
                                               );
                    $data = $crud->update_data('t_familia', $arrayData, 'id_familia ', $id);


                }


                if($data) {
                    echo "<script>alert('Hadia dodos ho sucessu...!')</script>";
                    echo "<script>window.location='../../familia-aldeia-" . $_POST['id_aldeia'] . ".html'</script>";

                } else {
                    echo "<script>alert('ERROR!')</script>";
                }


            }
        }
        break;
    case 'delete':
        $id = $_GET['id'];
        $file = $_GET['file'];
        unlink('../../foto_info/' . $file);
        $data = $crud->delete_data('t_familia ', 'id_familia', $id);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../familia-aldeia-" . $_GET['id_aldeia'] . ".html'</script>";

        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: chefe-familia.html');
        }
        break;

}
