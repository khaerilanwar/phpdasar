<?php 
    require "functions.php";

        if(isset($_POST["submit"])) {
            $nim = $_POST["nim"];
            $nama = $_POST["nama"];
            $jurusan = $_POST["jurusan"];
            $email = $_POST["email"];
            $alamat = $_POST["alamat"];
            
            tambahMahasiswa($nama, $nim, $email, $jurusan, $alamat);
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa Universitas</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="submit">Kirim</button>
                </td>
            </tr>
        </table>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>