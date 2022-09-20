<?php 
    session_start();

    if( isset($_SESSION["login"]) ) {
        header("Location:index.php");
        exit;
    }

    require "functions.php";

    if( isset($_POST["submit"]) ) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        if( mysqli_num_rows($result) === 1 ) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row["password"]) ) {
                // set session
                $_SESSION["login"] = true;
                echo "
                    <script>
                        alert('Anda Berhasil Login');
                        document.location.href = 'index.php';
                    </script>
                ";
                exit;
            }
        }

        $error = true;

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengguna</title>
</head>
<body>
    <h3>Silakan Login Dulu</h3>

    <?php if( isset( $error ) ) : ?>
        <p style="color: red;">Username / Password Salah</p>
    <?php endif; ?>

    <form action="" method="post">
        <table>
            <tr>
                <td>username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Masuk</button></td>
            </tr>
        </table>
    </form>

    <p>Belum punya akun ? <a href="registrasi.php">Daftar</a></p>
</body>
</html>