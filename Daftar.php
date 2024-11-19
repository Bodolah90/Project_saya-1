<?php
    include("controller/connect.php");

    $search = '';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM siswa WHERE nama LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM siswa";
}

    $status = $conn->query($sql);


    // $datas = $conn->query("select * from siswa");

    // while($data = $datas->fetch_assoc()){

    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Data</title>
</head>
<link href="./assets/style.css" rel="stylesheet" type="text/css">

<body>
    <header>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="./path/about.php">Tentang Kami</a></li>
                    <li><a href="./path/service.php">Gallery</a></li>
                    <li><a href="./path/contact.php">Kontak</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="galery">
    <img src="https://www.smktamansiswa1jakarta.sch.id/upload/imagecache/42369912logo_tamsis-480x270.png" alt="centre" class="centered-image">
    </div>
    <div class="container">
    <h1>RPL SMK TamanSiswa Jetis Yogyakarta</h1>
    <form method="POST" action="">
            <input type="text" name="search" placeholder="Cari berdasarkan nama..." value="<?php echo htmlspecialchars($search); ?>">   
     </form>
    <table border="2">
        <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Idsiswa</th>
            <th>Jkl</th>
            <th>Idkelas</th>
            <th colspan="2">manajemen data</th>
        </tr>
        <?php while ($row = $status->fetch_assoc()) {?>
        <tr>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['kelas']; ?></td>
            <td><?php echo $row['idsiswa']; ?></td>
            <td><?php echo $row['jkl']; ?></td>
            <td><?php echo $row['idkelas']; ?></td>
            <td><a href="views/edit.php?id=<?php echo $row['idsiswa']; ?>">Edit</a></td>
            <td><a href="views/delete.php?id=<?php echo $row['idsiswa']; ?>">Delete</a></td>
        </tr>
        <?php }?>
     </table>
     <a href="views/add.php">Tambah Baru</a>
    </div>
    <footer>
        <p>&copy; 2024 Situs Anda. Semua hak dilindungi.</p>
    </footer>
</body>
</html>