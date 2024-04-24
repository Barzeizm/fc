<?php
include "../service/database.php"; // Ubah jalur file sesuai struktur direktori Anda

if(isset($_POST['tambah_siswa'])){
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $jk = $_POST['jk'];
    $agama = $_POST['agama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $kelas = $_POST['kelas'];
    $nama_jurusan = $_POST['nama_jurusan'];

    // Periksa apakah nilai nama jurusan ada dalam tabel jurusan
    $check_jurusan_query = mysqli_query($conn, "SELECT * FROM jurusan WHERE nama_jurusan = '$nama_jurusan'");
    if(mysqli_num_rows($check_jurusan_query) > 0) {
        // Query INSERT INTO untuk menambahkan data siswa
        $insert_sql = "INSERT INTO siswa (nama, nis, jk, agama, tgl_lahir, kelas, nama_jurusan) 
                      VALUES ('$nama', '$nis', '$jk', '$agama', '$tgl_lahir', '$kelas', '$nama_jurusan')";

        $insert_query = mysqli_query($conn, $insert_sql);

        if ($insert_query) {
            // Jika berhasil, alihkan ke halaman index.php dengan status=sukses
            header('Location: ../index.php');
        } else {
            // Jika gagal, alihkan ke halaman index.php dengan status=gagal
            header('Location: ../index.php');
        }
    } else {
        // Jurusan yang dimasukkan tidak valid
        header('Location: ../index.php?status=jurusan_invalid');
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>
