<?php
require '../conn.php';

$idstaff = $_POST['idstaff'];
$idpengguna = $_POST['idpengguna'];
$katalaluan = $_POST['katalaluan'];
$staff_name = $_POST['staff_name'];

$sql = "UPDATE staff SET idpengguna = ?, katalaluan = ?, staff_name = ? WHERE idstaff = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sssi', $idpengguna, $katalaluan, $staff_name, $idstaff);
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