<?php

header("Content-type: application/json");
// Establish connection to MySQL database
include 'conn.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

switch ($_GET['act']) {
    case 'total_kada_aldeia':
        
        $sql = "SELECT a.naran_aldeia, COUNT(*) as total_familia FROM t_familia f, t_aldeia a WHERE f.id_aldeia=a.id_aldeia GROUP BY a.id_aldeia";
        $query = $conn->query($sql);
        $data = array();
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode($data);
        }

        break;
    case 'total_familia':
        $sql = "SELECT COUNT(*) as total FROM t_familia";
        $query = $conn->query($sql);
        $data = array();
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode($data);
        }

        break;

         case 'detallu_familia':
        $sql = "SELECT * FROM t_familia f, t_aldeia a WHERE f.id_aldeia=a.id_aldeia";
        $query = $conn->query($sql);
        $data = array();
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode($data);
        }

        break;


}