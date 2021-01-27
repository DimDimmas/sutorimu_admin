
<?php 
    ob_start();
  require_once('../config/koneksi.php');
  require_once('../models/database.php');
  include "../models/m_list.php";
  include "../models/m_genre.php";
  $connection = new Database($host, $user, $pass, $database);
  $grn = new Genre($connection);
  $lst = new Alist($connection);

  $id = $_POST['id_list'];  
  $title = $connection->conn->real_escape_string($_POST['title']);
  $rate = $connection->conn->real_escape_string($_POST['rate']);
  $status = $connection->conn->real_escape_string($_POST['status']);
  $type = $connection->conn->real_escape_string($_POST['type']);
  $total = $connection->conn->real_escape_string($_POST['total']);
  $aired = $connection->conn->real_escape_string($_POST['aired']);
  $durasi = $connection->conn->real_escape_string($_POST['durasi']);
  $sinopsis = $connection->conn->real_escape_string($_POST['sinopsis']);
  $trailer = $connection->conn->real_escape_string($_POST['trailer']);
  $chkgenre = implode(", ", $_POST['lgenre']);
  
  $pict = $_FILES['gbr_cvr']['name'];
  $extensi = explode(".", $_FILES['gbr_cvr']['name']);
  $gbr_cvr = "cvr-".round(microtime(true)).".".end($extensi);
  $sumber = $_FILES['gbr_cvr']['tmp_name'];

  if($pict == ""){
      $lst->edit("UPDATE tb_list SET title_list = '$title', rate = '$rate', status = '$status', type = '$type', total_episode = '$total',
      aired = '$aired', duration = '$durasi', synopsis = '$sinopsis', genre = '$chkgenre', trailer = '$trailer' WHERE tb_list . id_list = '$id' ");
      echo "<script>window.location='?page=list';</script>";
  }else{

    $upload = move_uploaded_file($sumber, "../assets/img/cover/".$gbr_cvr);

    if($upload){
        $lst->edit("UPDATE tb_list SET title_list = '$title', rate = '$rate', status = '$status', cover_image = '$gbr_cvr', type = '$type', total_episode = '$total',
      aired = '$aired', duration = '$durasi', synopsis = '$sinopsis', genre = '$chkgenre', trailer = '$trailer' WHERE tb_list . id_list = '$id' ");
      echo "<script>
            alert('Edit Success');
            window.location='?page=list';
            </script>";
    } else {
        echo "<script>
              alert('Upload Gambar Gagal');
              window.location='?page=list';<?script>";
    }
  }

?>