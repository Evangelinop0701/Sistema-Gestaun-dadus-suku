<?php

header("Content-type: application/json");
// Establish connection to MySQL database
include 'conn.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

switch ($_GET['act']) {
    case 'popu_ativo':

        $sql = "SELECT p.id_populasaun,p.no_eleitoral, p.naran_populasaun,p.sexu,p.data_moris, 
        p.id_aldeia, a.naran_aldeia, p.religiaun, p.s_civil, p.profisaun,p.residensia_atual,p.status,
         s.id_suku,s.naran_suku,pos.id_postu, pos.naran_postu, m.id_mun, m.naran_mun 
         FROM t_populasaun p, t_aldeia a, t_suku s, t_postu pos, t_mun m WHERE p.id_aldeia=a.id_aldeia AND 
        a.id_suku=s.id_suku AND s.id_postu=pos.id_postu AND pos.id_mun=m.id_mun AND p.status='Moris'";

        $result = $conn->query($sql);

        // Fetch data and encode as JSON
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            echo json_encode($data);
        }
        break;
    case 'detallu_sexu':
        $sexu = $_GET['sexu'];
        $sql = "SELECT p.id_populasaun,p.no_eleitoral, p.naran_populasaun,p.sexu,p.data_moris, 
        p.id_aldeia, a.naran_aldeia, p.religiaun, p.s_civil, p.profisaun,p.residensia_atual,p.status,
         s.id_suku,s.naran_suku,pos.id_postu, pos.naran_postu, m.id_mun, m.naran_mun 
         FROM t_populasaun p, t_aldeia a, t_suku s, t_postu pos, t_mun m WHERE p.id_aldeia=a.id_aldeia AND 
        a.id_suku=s.id_suku AND s.id_postu=pos.id_postu AND pos.id_mun=m.id_mun AND p.status='Moris' AND p.sexu = '$sexu'";

        $result = $conn->query($sql);

        // Fetch data and encode as JSON
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            echo json_encode($data);
            break;

            case 'detallu_aldeia':
        $ald = $_GET['aldeia'];
        $sql = "SELECT p.id_populasaun,p.no_eleitoral, p.naran_populasaun,p.sexu,p.data_moris, 
        p.id_aldeia, a.naran_aldeia, p.religiaun, p.s_civil, p.profisaun,p.residensia_atual,p.status,
         s.id_suku,s.naran_suku,pos.id_postu, pos.naran_postu, m.id_mun, m.naran_mun 
         FROM t_populasaun p, t_aldeia a, t_suku s, t_postu pos, t_mun m WHERE p.id_aldeia=a.id_aldeia AND 
        a.id_suku=s.id_suku AND s.id_postu=pos.id_postu AND pos.id_mun=m.id_mun AND p.status='Moris' AND a.naran_aldeia = '$ald'";

        $result = $conn->query($sql);

        // Fetch data and encode as JSON
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            echo json_encode($data);
            break;

        }
}
