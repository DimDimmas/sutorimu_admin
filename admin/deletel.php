<?php 
// koneksi database
include 'config/config.php';
 
// menangkap data id yang di kirim dari url
$id_list = $_GET['id'];

$pilih = mysqli_query($con, "select*from tb_list where id_list='$id_list'");

$data = mysqli_fetch_array($pilih);

$delCvr = $data['cover_image'];


 
// menghapus data dari database
if($delCvr == ''){
    mysqli_query($con,"delete from tb_list where id_list='$id_list'");

    echo "<script>alert('Berhasil Dihapus')</script>
    <script>window.location='index.php?page=list';</script>";
}else{
    unlink("assets/img/cover/".$delCvr);
    mysqli_query($con,"delete from tb_list where id_list='$id_list'");

    echo "<script>alert('Berhasil Dihapus')</script>
    <script>window.location='index.php?page=list';</script>";
}
?>