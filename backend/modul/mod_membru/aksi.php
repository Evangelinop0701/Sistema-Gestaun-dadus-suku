<?php

session_start();

include "../../class/class.php";
$db = new database();
$crud = new CRUD();
$mem = new membru();
$user = new user();

if (!$user->get_sessi()) {
    header('location: ../../../login.html');
}

switch ($_GET['act']) {
    case 'input':
        $arrayData = array(
             'naran_membro' => $_POST['naran_membro'],
             'data_moris' => $_POST['data_moris'],
             'fatin_moris' => $_POST['fatin_moris'],
             'sexu' => $_POST['sexu'],
             'relasaun_famili' => $_POST['relasaun_famili'],
             'relasaun_seluk' => $_POST['relasaun_seluk'],
             'estadu_civil' => $_POST['estadu_civil'],
             'knar' => $_POST['knar'],
             'religiaun' => $_POST['religiaun'],
             'abilidade' => $_POST['abilidade'],
             'id_familia' => $_POST['id_familia']
    );

        $data = $crud->insert_data('t_membro', $arrayData);
        if($data) {
            echo "<script>alert('Dados Rai ona...!')</script>";
            echo "<script>window.location='../../membro-familia-" . $_POST['id_familia'] . "-" . $_GET['id_aldeia'] . ".html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;


    case 'update':
        if (empty($_POST['relasaun_famili'])) {
            $arrayData = array(
                "naran_membro='" . $_POST['naran_membro'] . "'",
                "data_moris='" . $_POST['data_moris'] . "'",
                "fatin_moris='" . $_POST['fatin_moris'] . "'",
                "sexu='" . $_POST['sexu'] . "'",
                "relasaun_famili='" . $_POST['relasaun_famili'] . "'",
                "relasaun_seluk='" . $_POST['relasaun_seluk'] . "'",
                "estadu_civil='" . $_POST['estadu_civil'] . "'",
                "knar='" . $_POST['knar'] . "'",
                "abilidade='" . $_POST['abilidade'] . "'",
                "id_familia='" . $_POST['id_familia'] . "'"

            );
            $id = $_GET['id_m'];
            $data = $crud->update_data('t_membro', $arrayData, 'id_membro', $id);

            if($data) {
                echo "<script>alert('Hadia dados ho sucessu...!')</script>";
                echo "<script>window.location='../../membro-familia-" . $_POST['id_familia'] . "-" . $_GET['id_aldeia'] . ".html'</script>";

            } else {
                echo "<script>alert('ERROR!')</script>";
            }
        } elseif (!empty($_POST['relasaun_famili']) and !empty($_POST['relasaun_seluk'])) {

            echo "<script>alert('Deskupa ita boot nia relasaun familia rua kedas(" . $_POST['relasaun_famili'] . "," . $_POST['relasaun_seluk'] . ")...!')</script>";
            echo "<script>window.location='../../membro-familia-" . $_POST['id_familia'] . "-" . $_GET['id_aldeia'] . ".html'</script>";

        } else {
            $seluk = "";
            $arrayData = array(
                            "naran_membro='" . $_POST['naran_membro'] . "'",
                            "data_moris='" . $_POST['data_moris'] . "'",
                            "fatin_moris='" . $_POST['fatin_moris'] . "'",
                            "sexu='" . $_POST['sexu'] . "'",
                            "relasaun_famili='" . $_POST['relasaun_famili'] . "'",
                            "relasaun_seluk='" . $seluk . "'",
                            "estadu_civil='" . $_POST['estadu_civil'] . "'",
                            "knar='" . $_POST['knar'] . "'",
                            "abilidade='" . $_POST['abilidade'] . "'",
                            "id_familia='" . $_POST['id_familia'] . "'"

                        );
            $id = $_GET['id_m'];
            $data = $crud->update_data('t_membro', $arrayData, 'id_membro', $id);

            if($data) {
                echo "<script>alert('Hadia dados ho sucessu...!')</script>";
                echo "<script>window.location='../../membro-familia-" . $_POST['id_familia'] . "-" . $_GET['id_aldeia'] . ".html'</script>";

            } else {
                echo "<script>alert('ERROR!')</script>";
            }

        }
        break;



    case 'delete':
        $id = $_GET['id_me'];
        $data = $crud->delete_data('t_membro', 'id_membro', $id);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../membro-familia-" . $_GET['id_familia'] . "-" . $_GET['id_aldeia'] . ".html'</script>";

        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;
    case 'obs_sai':
        $data = $mem->update_obs_sai($_GET['id_me']);
        if(!$data) {
            echo "<script>alert('Observasaun Sai ona...!')</script>";
            echo "<script>window.location='../../membro-familia-" . $_GET['id_familia'] . "-" . $_GET['id_aldeia'] . ".html'</script>";

        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;
    case 'obs_kansela':
        $data = $mem->knasela_obs($_GET['id_me']);
        if(!$data) {
            echo "<script>alert('Observasaun Kansela ona...!')</script>";
            echo "<script>window.location='../../membro-familia-" . $_GET['id_familia'] . "-" . $_GET['id_aldeia'] . ".html'</script>";

        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;
}
