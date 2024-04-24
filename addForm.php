<?php
// Hubungkan ke database
include "./service/database.php";

// Query untuk mengambil daftar jurusan dari tabel jurusan
$sql = "SELECT nama_jurusan FROM jurusan";
$result = mysqli_query($conn, $sql);

// Inisialisasi array untuk menyimpan opsi jurusan
$options = array();

// Periksa apakah query berhasil dieksekusi
if (mysqli_num_rows($result) > 0) {
    // Iterasi melalui hasil query dan tambahkan nama jurusan ke dalam array $options
    while ($row = mysqli_fetch_assoc($result)) {
        $options[] = $row['nama_jurusan'];
    }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="./global.css">
</head>
<body>
    <main class="add-content">
        <div class="add-form">
            <h1>Tambah Siswa</h1>
            <form action="controller/add.php" method="POST">
                <div class="input-data">
                    <label for="nis">Nis</label>
                    <input type="text" placeholder="test" name="nis">
                </div>
                <div class="input-data">
                    <label for="nama">Nama</label>
                    <input type="text" placeholder="test" name="nama">
                </div>
                <div class="input-data">
                    <label for="jk">Jenis Kelamin</label>
                    <input type="checkbox" id="" name="jk" value="Laki-Laki">
                    <label for="jk">Laki-Laki</label><br>
                    <input type="checkbox" id="" name="jk" value="Perempuan">
                    <label for="jk">Perempuan</label><br>
                </div>
                <div class="input-data">
                    <label for="agama">Agama</label>
                    <input type="text" placeholder="test" name="agama">
                </div>
                <div class="input-data">
                    <label for="tgl_lahir">Tgl Lahir</label>
                    <input type="date" placeholder="test" name="tgl_lahir">
                </div>
                <div class="input-data">
                    <label for="kelas">Kelas</label>
                    <input type="text" placeholder="test" name="kelas">
                </div>
                <div class="input-data">
                    <label for="nama_jurusan">Jurusan</label>
                    <select name="nama_jurusan" id="nama_jurusan">
                        <option value="">Pilih Jurusan</option>

                        <?php
                        // Iterasi melalui opsi jurusan dan tambahkan opsi ke dalam elemen select
                        foreach ($options as $option) {
                            echo "<option value='$option'>$option</option>";
                        }
                        ?>

                    </select>
                </div>
                <div class="">
                    <input type="submit" value="Cancel" nane="tambah_siswa">
                </div>
                <div class="">
                    <input type="submit" value="Submit" name="tambah_siswa">
                </div>
            </form>
        </div>
    </main>
</body>
</html>