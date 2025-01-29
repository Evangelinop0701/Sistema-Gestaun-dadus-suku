<?php


header("Content-type: application/json");

include "conn.php";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

switch ($_GET['act']) {
    case 'total_jeral':
        $sql = "SELECT COUNT(*) as total_mate FROM t_populasaun p WHERE p.status='Mate'";
        $result = $conn->query($sql);

        // Fetch data and encode as JSON
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        echo json_encode($data);
        break;
    case 'total_mane':
        $sql = "SELECT COUNT(*) as total_mane FROM t_populasaun p WHERE p.status='Mate' AND p.sexu='M'";
        $result = $conn->query($sql);

        // Fetch data and encode as JSON
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        echo json_encode($data);
        break;
    case 'total_feto':
        $sql = "SELECT COUNT(*) as total_feto FROM t_populasaun p WHERE p.status='Mate' AND p.sexu='F'";
        $result = $conn->query($sql);

        // Fetch data and encode as JSON
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        echo json_encode($data);
        break;
    case 'total_kada_aldeia':
        $sql = "SELECT a.naran_aldeia, COUNT(*) as total_aldeia FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Mate' GROUP BY p.id_aldeia";
        $result = $conn->query($sql);

        // Fetch data and encode as JSON
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        echo json_encode($data);
        break;

            case 'detallu_sexu':
        $sexu = $_GET['sexu'];
        $sql = "SELECT * FROM t_mate m, t_populasaun p WHERE m.id_populasaun=p.id_populasaun AND p.status='Mate' AND p.sexu='$sexu'";

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

        case 'detallu_mate':
        $sql = "SELECT * FROM t_mate m, t_populasaun p WHERE m.id_populasaun=p.id_populasaun AND p.status='Mate'";

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
}

