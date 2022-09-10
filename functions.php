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
?>