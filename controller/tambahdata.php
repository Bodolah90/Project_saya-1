<?php
include "connect.php";

$id = $_POST['fidsiswa'];
$nama = $_POST["fname"];
$jkl = $_POST["fjkl"];
$kelas = $_POST["fkelas"];
$idkelas = $_POST["fidkelas"];

$status = $conn->query("INSERT INTO siswa (idsiswa,nama,jkl,kelas,idkelas) VALUES ('$id','$nama','$jkl','$kelas','$idkelas')");

if ($status) {
    header("Location:../");
    echo "Data berhasil ditambahkan bang";
} else {
    echo "Error";
}
?>
