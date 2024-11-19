<?php
include ("../controller/connect.php");

    $id = $_POST['fidsiswa'];
    $nama = $_POST["fname"];
    $jkl = $_POST["fjkl"];
    $kelas = $_POST["fkelas"];
    $idkelas = $_POST["fidkelas"];


    print_r($id);
    print_r($nama);


    $status = $conn->query("UPDATE siswa set nama='$nama',jkl='$jkl',kelas='$kelas',idkelas='$idkelas' where idsiswa=$id");

    if ($status) {
        echo "Data Berhasil Diupdate";
    } else {
        echo  "Data Gagal Diupdate";

    }
?>