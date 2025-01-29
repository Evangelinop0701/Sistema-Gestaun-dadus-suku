<?php 
 
 header("Content-type: application/json");
// Establish connection to MySQL database
include 'conn.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



	$pass = md5($_POST['password']);
	$uname = $_POST['username'];
	$sql = "SELECT * FROM t_users u, t_konselu_suku k, t_populasaun p, t_aldeia a, t_suku s, t_postu po, t_mun m, t_periodo per WHERE u.id_konselo=k.id_konselu AND k.id_populasaun=p.id_populasaun AND p.id_aldeia=a.id_aldeia AND k.id_periodo=per.id_periodo AND a.id_suku=s.id_suku AND s.id_postu=po.id_postu AND po.id_mun=m.id_mun AND u.username='$uname' AND u.password='$pass'";

		$query = $conn->query($sql);
        $result = $query->fetch_assoc();
        $num_rows = mysqli_num_rows($query);

     if ($num_rows > 0) {
     	echo json_encode(array('success' => true, 'message' => 'Login successful'));
     }else{
     	var_dump($num_rows);
     	echo json_encode(array('success' => false, 'message' => 'Invalid username or password'));
     }
     



 ?>