<?php

    include "./service/database.php";

    $id = $_GET['id'];

    $query = "SELECT * FROM siswa WHERE id = $id limit 1";

    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($result);

    $query_jurusan = "SELECT nama_jurusan FROM jurusan";
    $result_jurusan = mysqli_query($conn, $query_jurusan);

    // Inisialisasi array untuk menyimpan opsi jurusan
    $options = array();

    // Memasukkan opsi jurusan ke dalam array
    while ($jurusan = mysqli_fetch_assoc($result_jurusan)) {
        $options[] = $jurusan['nama_jurusan'];
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Data</title>
        <link rel="stylesheet" href="global.css">
    </head>
    <body>
        <form action="controller/edit.php" method="POST">
                <div class="input-data">
                    <label for="nis">Nis</label>
                    <input type="text" placeholder="test" name="nis" value="<?= $row['nis'] ?>">
                    <input type="hidden" placeholder="test" name="id" value="<?= $row['id'] ?>">
                </div>
                <div class="input-data">
                    <label for="nama">Nama</label>
                    <input type="text" placeholder="test" name="nama" value="<?= $row['nama'] ?>">
                </div>
                <div class="input-data">
                    <label for="jk">Jenis Kelamin</label>
                    <input type="text" placeholder="test" name="jk" value="<?= $row['jk'] ?>">
                </div>
                <div class="input-data">
                    <label for="agama">Agama</label>
                    <input type="text" placeholder="test" name="agama" value="<?= $row['agama'] ?>">
                </div>
                <div class="input-data">
                    <label for="tgl_lahir">Tgl Lahir</label>
                    <input type="date" placeholder="test" name="tgl_lahir" value="<?= $row['tgl_lahir'] ?>">
                </div>
                <div class="input-data">
                    <label for="kelas">Kelas</label>
                    <input type="text" placeholder="test" name="kelas" value="<?= $row['kelas'] ?>">
                </div>
                <div class="input-data">
                    <label for="nama_jurusan">Jurusan</label>
                    <select name="nama_jurusan" id="nama_jurusan" value="<?= $row['nama_jurusan'] ?>">
                        <option value=""><?= $row['nama_jurusan']?></option>

                        <?php
                        // Iterasi melalui opsi jurusan dan tambahkan opsi ke dalam elemen select
                        foreach ($options as $option) {
                            // Jika nama jurusan pada baris data sama dengan opsi saat ini, tambahkan atribut 'selected'
                            $selected = ($option == $row['nama_jurusan']) ? 'selected' : '';
                            echo "<option value='$option' $selected>$option</option>";
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
    </body>
</html>