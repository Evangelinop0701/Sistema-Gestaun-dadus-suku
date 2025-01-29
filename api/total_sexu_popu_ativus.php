<?php

header("Content-type: application/json");
include 'conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

switch ($_GET['act']) {
    case 'dt_popu':
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
}
echo json_encode($data);
        break;
    case 'toJeral':
        $sql = "SELECT COUNT(*) AS total FROM t_populasaun p WHERE p.status='Moris'";
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
    case 'tmane':
        $sql = "SELECT p.sexu, COUNT(*) AS total_sexu FROM t_populasaun p WHERE p.status='Moris' AND p.sexu='M'";
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
    
   case 'tfeto':
      $sql = "SELECT p.sexu, COUNT(*) AS total_sexu FROM t_populasaun p WHERE p.status='Moris' AND p.sexu='F'";
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
          $sql = "SELECT a.naran_aldeia, COUNT(*) AS total_aldeia FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Moris' GROUP BY a.naran_aldeia";
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
}

// Select data from database


?>
