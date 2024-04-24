<?php 

include "../service/database.php";

$id = $_GET['id'];

$query = "DELETE FROM siswa WHERE id = '$id'";

if($conn->query($query)) {
    header("location: ../index.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>