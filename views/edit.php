<?php
    include ("../controller/connect.php");

    $id = $_GET['id'];

    $status = $conn->query("select * from siswa where idsiswa=$id limit 1");
    $row = $status->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

a {
    display: inline-block;
    margin: 10px 5px;
    padding: 10px 15px;
    background-color: darkgreen;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

a:hover {
    background-color: limegreen;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: darkgreen;
    color: white;
}

tr:hover {
    background-color: lightgray;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:nth-child(odd) {
    background-color: #ffffff;
}

caption {
    margin: 10px;
    font-size: 1.5em;
    font-weight: bold;
}
.btn {
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-edit {
    background-color: #ffc107;
}

.btn-edit:hover {
    background-color: #e0a800;
}

.btn-delete {
    background-color: #dc3545;
}

.btn-delete:hover {
    background-color: #c82333;
}

.btn-show {
    background-color: #007bff;
}

.btn-show:hover {
    background-color: #0056b3;
}

/* Form Styling */
form {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"] {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: 100%;
    box-sizing: border-box;
}

button {
    padding: 10px;
    background-color: cyan;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #218838;
}

a.btn-show {
    padding: 10px 15px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
    transition: background-color 0.3s;
    text-align: center;
}

a.btn-show:hover {
    background-color: #0056b3;
}


    </style>
</head>
<body>
<div class="container">
        <h1>Edit Data Siswa</h1>
        <form action="update.php" method="post">
            <table>
                <tr>
                    <td><label for="fname">Nama:</label></td>
                    <td><input type="hidden" value="<?php echo $row['idsiswa']; ?>" name="fidsiswa"><input type="text" value="<?php echo $row['nama']; ?>" name="fname" id="fname"></td>
                </tr>
                <tr>
                    <td><label for="fjkl">Jkl:</label></td>
                    <td><input type="text" value="<?php echo $row['jkl']; ?>" name="fjkl" id="fjkl"></td>
                </tr>
                <tr>
                    <td><label for="fkelas">Kelas:</label></td>
                    <td><input type="text" value="<?php echo $row['kelas']; ?>" name="fkelas" id="fkelas"></td>
                </tr>
                <tr>
                    <td><label for="fidkelas">Idkelas:</label></td>
                    <td><input type="text" value="<?php echo $row['idkelas']; ?>" name="fidkelas" id="fidkelas"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;"><input type="submit" value="Ubah Data"></td>
                </tr>
            </table>
        </form>
        <a href="../Daftar.php">Back to table <table></table></a>
    </div>
</body>
</html>