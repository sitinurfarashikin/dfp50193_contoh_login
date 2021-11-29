<?php
require '../conn.php';

$idpengguna = $_POST['idpengguna'];
$staff_name = $_POST['staff_name'];
$pswd = password_hash($idpengguna, PASSWORD_BCRYPT);
$sql = "INSERT INTO staff (idpengguna, katalaluan, staff_name) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $idpengguna, $pswd, $staff_name);
$stmt->execute();

if ($mysqli->error) {
    ?>
    <script>
        alert('Maaf! Nama tersebut sudah wujud dalam senarai');
        window.location = 'index.php';
    </script>
    <?php
    exit;
} else {
    header('location: index.php');
}