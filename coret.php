<?php 

    $nama = 'anwar.jpg';
    echo $nama;
    $namaFile = explode('.', $nama);
    $namaFile = end($namaFile);
    echo "<br>";
    echo $namaFile;

?>