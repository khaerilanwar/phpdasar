<?php 
    require "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa Universitas</h1>
    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br>
    <br>

    <table cellpadding="8" cellspacing="0" border="2">
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>Alamat</th>
        </tr>
        <?php 
            $query = "SELECT * FROM mahasiswa ORDER by nama";
            $mahasiswa =  query($query);
        ?>
        <?php foreach($mahasiswa as $mhs) : ?>
            <tr>
                <td><?= $mhs["nama"]; ?></td>
                <td><?= $mhs["nim"]; ?></td>
                <td><?= $mhs["jurusan"]; ?></td>
                <td><?= $mhs["email"]; ?></td>
                <td><?= $mhs["alamat"]; ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
</body>
</html>