<?php 

include "../service/database.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$nis = $_POST['nis'];
$jk = $_POST['jk'];
$agama = $_POST['agama'];
$tgl_lahir = $_POST['tgl_lahir'];
$kelas = $_POST['kelas'];
$nama_jurusan = $_POST['nama_jurusan'];

$query = "UPDATE siswa SET nama = '$nama', nis = '$nis', jk = '$jk', agama = '$agama',
        tgl_lahir = '$tgl_lahir', kelas = '$kelas', nama_jurusan = '$nama_jurusan' WHERE id = '$id'";

if($conn->query($query)) {
    //redirect ke halaman index.php 
    header("location: ../index.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>