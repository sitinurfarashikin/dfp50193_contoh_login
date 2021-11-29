<?php
require '../conn.php';

$idstaff = $_GET['idstaff'];
$sql = "SELECT idpengguna FROM staff WHERE idstaff = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $idstaff);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($idpengguna);
$stmt->fetch();
$pswd = password_hash($idpengguna, PASSWORD_BCRYPT);

$sql = "UPDATE staff SET katalaluan = ? WHERE idstaff = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('si', $pswd, $idstaff);
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