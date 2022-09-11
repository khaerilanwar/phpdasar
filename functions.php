<?php 

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db_name  = "phpdasar";

    $conn = mysqli_connect($hostname, $username, $password, $db_name);

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambahMahasiswa($data) {
        global $conn;
        $nama = $data["nama"];
        $nim = $data["nim"];
        $email = $data["email"];
        $jurusan = $data["jurusan"];
        $gambar = $data["gambar"];
        $query = "INSERT INTO mahasiswa VALUES('', '$nim','$nama', '$email','$jurusan', '$gambar')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function hapus($id) {
        global $conn;
        $query = "DELETE FROM mahasiswa where id = $id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function ubahData($data) {
        global $conn;
        $id = $data["id"];
        $nim = $data["nim"];
        $nama = $data["nama"];
        $email = $data["email"];
        $jurusan = $data["jurusan"];
        $gambar = $data["gambar"];

        $query = "UPDATE mahasiswa SET 
                    nim = '$nim', nama = '$nama',
                    email = '$email', jurusan = '$jurusan',
                    gambar = '$gambar' WHERE id = '$id'
        ";

        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }

    function cari($cari) {
        $query = "SELECT * FROM mahasiswa WHERE
                    nim LIKE '%$cari%' OR
                    nama LIKE '%$cari%' OR
                    email LIKE '%$cari%' OR
                    jurusan LIKE '%$cari%'
                ";
        
        return query($query);
    }
?>