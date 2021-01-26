<?php 
    $con = mysqli_connect("localhost","root","","sutorimu");
    
    // Check connection
    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }

    $host = 'localhost'; // Nama hostnya
    $username = 'root'; // Username
    $password = ''; // Password (Isi jika menggunakan password)
    $database = 'sutorimu'; // Nama databasenya

    // Koneksi ke MySQL dengan PDO
    $pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>