<?php 
    require "functions.php";

    $data_nim = mysqli_query($conn,"SELECT nim from mahasiswa");
    
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
                    <script>
                        alert('Data Berhasil Ditambahkan');
                        document.location.href = 'index.php';
                    </script>
                ";
        } else {
            echo "
                    <script>
                        alert('Data Gagal DItambahkan');
                    </script>
                ";
            header("Refresh:0");
        }
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
    <form action="" method="post" enctype="multipart/form-data">
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
                <td><input type="file" name="gambar"></td>
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