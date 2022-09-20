<?php 
    session_start();
    
    if( !isset( $_SESSION["login"] ) ) {
        header("Location:login.php");
        exit;
    }

    require "functions.php";

    if(hapus($_GET["id"]) > 0) {
        echo "<script>
                alert('Data Mahasiswa Sudah di hapus');
                document.location.href = 'index.php';
            </script>";
        }
?>