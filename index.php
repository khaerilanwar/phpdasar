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
    <form action="" method="post">
        <input type="text" name="cari">
        <button type="submit" name="submit">Cari</button>
    </form>

    <?php 
        if(isset($_POST['submit'])) {
            $mahasiswa = cari($_POST['cari']);
        } else {
            $query = "SELECT * FROM mahasiswa ORDER by nama";
            $mahasiswa = query($query);
        }
        $i = 1;
    ?>

    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br>
    <br>

    <table cellpadding="8" cellspacing="0" border="2">
        <tr>
            <th>No.</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php foreach($mahasiswa as $mhs) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $mhs["nim"]; ?></td>
                <td><?= $mhs["nama"]; ?></td>
                <td><?= $mhs["jurusan"]; ?></td>
                <td><?= $mhs["email"]; ?></td>
                <td>
                    <img src="img/<?= $mhs["gambar"]; ?>" alt="Gambar Mahasiswa" width="50">
                </td>
                <td>
                    <a href="ubah.php?id=<?= $mhs['id']; ?>">ubah</a>
                    <a href="hapus.php?id=<?= $mhs['id']; ?>">hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</body>
</html>