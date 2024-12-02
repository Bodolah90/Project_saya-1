<?php
    include("controller/connect.php");

    $search = '';
    $kelas = '';
    $jkl = '';

    $conditions = [];

    if (isset($_POST['search']) && !empty($_POST['search'])) {
        $search = $_POST['search'];
        $conditions[] = "nama LIKE '%$search%'";
    }

    if (isset($_POST['kelas']) && !empty($_POST['kelas'])) {
        $kelas = $_POST['kelas'];
        $conditions[] = "kelas = '$kelas'";
    }

    if (isset($_POST['jkl']) && !empty($_POST['jkl'])) {
        $jkl = $_POST['jkl'];
        $conditions[] = "jkl = '$jkl'";
    }

    $sql = "SELECT * FROM siswa";
    if (count($conditions) > 0) {
        $sql .= " WHERE " . implode(' AND ', $conditions);
    }

    $status = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Data</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
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
            <select name="kelas">
                <option value="">Pilih kelas</option>
                <option value="XIRPL" <?php if ($kelas == 'XIRPL') echo 'selected'; ?>>XIRPL</option>
                <option value="XRPL" <?php if ($kelas == 'XRPL') echo 'selected'; ?>>XRPL</option>
            </select>
            <select name="jkl">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L" <?php if ($jkl == 'L') echo 'selected'; ?>>Laki-laki</option>
                <option value="P" <?php if ($jkl == 'P') echo 'selected'; ?>>Perempuan</option>
            </select>
            <input type="text" name="search" placeholder="Cari berdasarkan nama..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="oval-button">Cari</button>
        </form>
        <table border="2">
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Idsiswa</th>
                <th>Jkl</th>
                <th>Idkelas</th>
                <th colspan="2">Manajemen Data</th>
            </tr>
            <?php while ($row = $status->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['kelas']; ?></td>
                <td><?php echo $row['idsiswa']; ?></td>
                <td><?php echo $row['jkl']; ?></td>
                <td><?php echo $row['idkelas']; ?></td>
                <td><a href="views/edit.php?id=<?php echo $row['idsiswa']; ?>">Edit</a></td>
                <td><a href="views/delete.php?id=<?php echo $row['idsiswa']; ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
        <a href="views/add.php">Tambah Baru</a>
    </div>
    <footer>
        <p>&copy; 2024 Situs Anda. Semua hak dilindungi.</p>
    </footer>
</body>
</html>
