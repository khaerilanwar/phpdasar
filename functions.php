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
        $nama = htmlspecialchars($data["nama"]);
        $nim = htmlspecialchars($data["nim"]);
        $email = htmlentities($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        // upload gambar
        $gambar = upload();
        if( !$gambar ) {
            return false;
        }

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
        $gambarLama = $data["gambarLama"];

        // cek apakah user pilih gambar baru atau tidak
        if( $_FILES["gambar"]["error"] === 4 ) {
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
        }

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

    function upload() {
        $namaFile = $_FILES["gambar"]["name"];
        $ukuranFile = $_FILES["gambar"]["size"];
        $errorFile = $_FILES["gambar"]["error"];
        $tmpName = $_FILES["gambar"]["tmp_name"];

        // cek apakah tidak ada gambar yang di upload
        if( $errorFile === 4 ) {
            echo "<script>
                    alert('pilih gambar lebih dulu')
                </script>
            ";
            header("Refresh:0");
            return false;
        }
        
        // cek apakah yang di upload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = end($ekstensiGambar);
        $ekstensiGambar = strtolower($ekstensiGambar);
        
        if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
            echo "<script>
                    alert('File yang anda upload bukan gambar');
                </script>
            ";
            header("Refresh:0");
            return false;
        }
        
        // cek apakah ukurannya lebih dari 1 mb
        if( $ukuranFile > 1000000 ) {
            echo "<script>
                    alert('File yang anda upload melebihi 1 mb')
                </script>
            ";
            return false;
        }

        // lolos pengecekan, gambar siap diupload
        // generate nama baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;
    }
?>