<?php 
    require "functions.php";

    if( isset($_POST["submit"]) ) {
        if( addUser($_POST) > 0 ) {
            echo "
                    <script>
                        alert('Pengguna Berhasil Ditambahkan');
                    </script>
                ";
        } else {
            echo "
                    <script>
                        alert('Pengguna Gagal Ditambahkan');
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
    <title>Registrasi User</title>
</head>
<body>
    <h1>Halaman Registrasi Pengguna</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" require></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" require></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password1" name="password1" require></td>
            </tr>
            <tr>
                <td>Konfirmasi password</td>
                <td><input type="password2" name="password2" require></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Daftar</button></td>
            </tr>
        </table>
    </form>

    <a href="index.php">Kembali</a>
</body>
</html>