<?php 
// koneksi database
include 'config/config.php';
 
// menangkap data id yang di kirim dari url
$id_list = $_GET['id'];

$pilih = mysqli_query($con, "select*from tb_list where id_list='$id_list'");

$data = mysqli_fetch_array($pilih);

$delCvr = $data['cover_image'];

unlink("assets/img/cover/".$delCvr);
 
// menghapus data dari database
mysqli_query($con,"delete from tb_list where id_list='$id_list'");

echo "<script>alert('Berhasil Dihapus')</script>
<script>window.location='?page=list';</script>";
?>