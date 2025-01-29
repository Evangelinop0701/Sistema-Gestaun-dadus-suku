<?php

error_reporting();
include "../../class/class.php";
$db = new database();
$est = new estrutura();
$user = new user();
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
                echo "<script>window.location='../../estrutura.html'</script>";
                return false;

            } else {
                move_uploaded_file($lokasi_file, '../../foto_estrutura/' . $name_file_unik);
                $arrayData = array(
                    'id_populasaun' => $_POST['id_populasaun'],
                    'grau_edukasaun' => $_POST['grau_edukasaun'],
                    'kargu' => $_POST['kargu'],
                    'id_periodo' => $_POST['id_periodo'],
                    'foto' => $name_file_unik

                );
                $data = $crud->insert_data('t_konselu_suku', $arrayData);

                $us = $est->auto_user($_POST['id_populasaun']);
                $uname = explode(" ", $us[0]['naran_populasaun']);
                $pass = "password";
                $id = $us[0]['id_konselu'];
                $un = $uname[0];


                $user->input_user($id, $un, md5($pass), $pass);

                if($data) {
                    echo "<script>alert('Dados Rai ona...!')</script>";
                    echo "<script>window.location='../../estrutura.html'</script>";
                } else {
                    echo "<script>alert('ERROR!')</script>";
                }


            }
        } else {

            $foto = " ";


            $arrayData = array(
                        'id_populasaun ' => $_POST['id_populasaun '],
                        'grau_edukasaun' => $_POST['grau_edukasaun'],
                        'kargu' => $_POST['kargu'],
                        'id_periodo ' => $_POST['id_periodo '],
                        'foto' => $foto
                            );

            $data = $crud->insert_data('t_konselu_suku', $arrayData);

            if($data) {
                echo "<script>alert('Dados Rai ona...!')</script>";
                echo "<script>window.location='../../estrutura.html'</script>";

            } else {
                echo "<script>alert('ERROR!')</script>";
            }

        }
        break;
    case 'update':
        $id = $_GET['id_e'];
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
                 "id_populasaun='" . $_POST['id_populasaun'] . "'",
                 "grau_edukasaun='" . $_POST['grau_edukasaun'] . "'",
                 "kargu='" . $_POST['kargu'] . "'",
                 "id_periodo='" . $_POST['id_periodo'] . "'",
                 "foto='" . $foto . "'"
            );
            $data = $crud->update_data('t_konselu_suku', $arrayData, 'id_konselu', $id);

            if($data) {
                echo "<script>alert('Hadia dodos ho sucessu...!')</script>";
                echo "<script>window.location='../../estrutura.html'</script>";

            } else {
                echo "<script>alert('ERROR!')</script>";
            }
        } else {

            $del = $_POST['foto'];
            if (!empty($del)) {
                unlink("../../foto_estrutura/$del");
                if (!in_array($extensi, $wite_list)) {
                    echo "<script>alert('File laos ho extensaun " . $extensi . " laos Imagen...!')</script>";
                    echo "<script>window.location='../../estrutura.html'</script>";
                } else {
                    move_uploaded_file($lokasi_file, '../../foto_familia/' . $name_file_unik);
                    $arrayData = array(
                                        "id_populasaun='" . $_POST['id_populasaun'] . "'",
                                        "grau_edukasaun='" . $_POST['grau_edukasaun'] . "'",
                                        "kargu='" . $_POST['kargu'] . "'",
                                        "id_periodo='" . $_POST['id_periodo'] . "'",
                                        "foto='" . $name_file_unik . "'"

                                               );
                    $data = $crud->update_data('t_konselu_suku', $arrayData, 'id_konselu ', $id);


                }


                if($data) {
                    echo "<script>alert('Hadia dodos ho sucessu...!')</script>";
                    echo "<script>window.location='../../estrutura.html'</script>";

                } else {
                    echo "<script>alert('ERROR!')</script>";
                }


            }
        }
        break;
    case 'delete':
        $id = $_GET['id_e'];
        $file = $_GET['file'];
        unlink('../../foto_estrutura/' . $file);
        $data = $crud->delete_data('t_konselu_suku ', 'id_konselu', $id);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../estrutura.html'</script>";

        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: chefe-familia.html');
        }
        break;

}
