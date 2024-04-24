<?php
    require_once "service/database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="global.css">
    <title>Siswa Sekolah</title>
</head>
<body>
    <main class="table-container">
        <div class="table">
            <div class="header-table">
                <h1>List Siswa</h1>
                <a href="addForm.php">+ Add Siswa</a>
            </div>
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Tgl Lahir</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Action</th>
                </tr>
                <?php
                    $sql = "SELECT siswa.id, 
                            siswa.nis, siswa.nama, siswa.jk, siswa.agama,
                            siswa.tgl_lahir,siswa.kelas,jurusan.nama_jurusan AS nama_jurusan
                            FROM siswa
                            LEFT JOIN jurusan ON siswa.nama_jurusan = jurusan.nama_jurusan
                            ORDER BY siswa.id;";
                    $query = mysqli_query($conn, $sql);
                    $row_count = 1;
                    while($data_siswa = mysqli_fetch_array($query)){
                        $class = ($row_count % 2 == 0) ? 'even' : 'odd';
                        echo "<tr class='$class'>";
                            echo "<td>".$row_count."</td>";
                            echo "<td>".$data_siswa['nis']."</td>";
                            echo "<td>".$data_siswa['nama']."</td>";
                            echo "<td>".$data_siswa['jk']."</td>";
                            echo "<td>".$data_siswa['agama']."</td>";
                            echo "<td>".$data_siswa['tgl_lahir']."</td>";
                            echo "<td>".$data_siswa['kelas']."</td>";
                            echo "<td>".$data_siswa['nama_jurusan']."</td>";
                            echo "<td>";
                                echo "<div class='action-btn'>";
                                    echo "<a href='edit-form.php?id=".$data_siswa['id']."' class='edit'>Edit</a>";
                                    echo "<a href='./controller/delete.php?id=".$data_siswa['id']."' class='delete'>Hapus</a>";
                                echo "</div>";
                            echo "</td>";
                        echo "</tr>";
                        $row_count++;
                    }
                ?>
                    <tr>
                </tr>
            </table>
        </div>
    </main>
</body>
</html>