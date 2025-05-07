<?php
    include ("../controller/connect.php");
    
    
        $id = $_GET['id'];

        var_dump($id);
        
        $status = $conn->query("delete from siswa where id=$id");
    
        if ($status) {
            header("Location:../index.php");
            echo "Data berhasil dihapus bang";
        } else {
            echo "Error";
        }

?>
