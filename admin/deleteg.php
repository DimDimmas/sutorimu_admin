<?php 
// koneksi database
include 'config/config.php';
 
// menangkap data id yang di kirim dari url
$id_genre = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"delete from tb_genre where id_genre='$id_genre'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php?page=genre")
?>