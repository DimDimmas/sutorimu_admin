<?php 
// koneksi database
include 'config/config.php';
 
// menangkap data id yang di kirim dari url
$no = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"delete from tb_update where no='$no'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php?page=update")
?>