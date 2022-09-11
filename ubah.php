<?php 
    require "functions.php";

    $id = $_GET['id'];
    $query = "SELECT * FROM mahasiswa WHERE id = $id";
    $result = query($query);

    $nim = $result[0]['nim'];
    $nama = $result[0]['nama'];
    $email = $result[0]['email'];
    $jurusan = $result[0]['jurusan'];
    $gambar = $result[0]['gambar'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>
    <form action="" method="post">
        <table>
            <tr> <td><input type="hidden" name="id" value="<?= $id; ?>"></td> </tr>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" value="<?= $nim; ?>"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?= $nama; ?>"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" value="<?= $jurusan; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?= $email; ?>"></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td><input type="text" name="gambar" value="<?= $gambar; ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="submit">Kirim</button>
                </td>
            </tr>
        </table>
    </form>

    <a href="index.php">Kembali</a>

    <?php 
        if(isset($_POST['submit'])) {
            if(ubahData($_POST) > 0) {
                echo "
                    <script>
                        alert('Data Berhasil Di ubah');
                        document.location.href = 'index.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data Gagal DItambahkan');
                        document.location.href = 'index.php';
                    </script>
                ";
            }
        }
    ?>
</body>
</html>