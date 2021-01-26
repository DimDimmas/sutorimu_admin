<?php 
// koneksi database
include 'config/config.php';
 
// menangkap data id yang di kirim dari url
$id_list = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"delete from tb_list where id_list='$id_list'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php?page=list")
?>