<?php


include "../../class/class.php";
$db = new database();
$crud = new CRUD();
$user = new user();

switch ($_GET['act']) {
    case 'reset':
        $pas1 = "password";
        $pas = md5($pas1);
        $id = $_GET['id'];
        $data = $user->reset_password($pas, $pas1, $id);

        if(!$data) {
            echo "<script>alert('Pssword Reset Ona...!')</script>";
            echo "<script>window.location='../../users.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;
    case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_users', 'id_users', $id);
        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../users.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;
    case 'update':
        $data = $user->update_users($_POST['username'], md5($_POST['pass1']), $_POST['pass1'], $_GET['id']);

        if(!$data) {
            echo "<script>alert('Pssword Hadia Ona...!')</script>";
            echo "<script>window.location='../../'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;
}
