<?php 
// koneksi database
include 'config/config.php';
 
// menangkap data id yang di kirim dari url
$no = $_GET['id'];

$pilih = mysqli_query($con, "select*from tb_update where no='$no'");

$data = mysqli_fetch_array($pilih);

$delCvr = $data['preview'];

// menghapus data dari database
if($delCvr == ''){
    mysqli_query($con,"delete from tb_update where no='$no'");

    echo "<script>alert('Berhasil Dihapus')</script>
    <script>window.location='index.php?page=update';</script>";
}else{
    unlink("assets/img/preview/".$delCvr);
    mysqli_query($con,"delete from tb_update where no='$no'");

    echo "<script>alert('Berhasil Dihapus')</script>
    <script>window.location='index.php?page=update';</script>";
}

?>