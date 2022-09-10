<?php 
    require "functions.php";

    $data_nim = mysqli_query($conn,"SELECT nim from mahasiswa");
    // $data_nim = mysqli_fetch_row($data_nim);
    // var_dump($data_nim);
    
    $rows = [];
    while($row = mysqli_fetch_row($data_nim)) {
        $rows[] = implode('',$row);
    }

    if(isset($_POST["submit"])) {
        if( in_array($_POST["nim"], $rows) ) {
            echo "
            <script>alert('Data Mahasiswa Sudah Ada')</script>
            ";
            header("Refresh:0");
            exit;
        }
        elseif(tambahMahasiswa($_POST) > 0) {
            echo "
            <script>alert('Data Berhasil DItambahkan')</script>
            ";
        } else {
            echo "
            <script>alert('Data Gagal DItambahkan')</script>
            ";
        }
        header('location: index.php');
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
                <td>Gambar</td>
                <td><input type="text" name="gambar"></td>
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