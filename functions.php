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
?>