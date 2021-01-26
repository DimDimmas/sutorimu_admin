<?php 
    ob_start();
    require_once('../config/koneksi.php');
    require_once('../models/database.php');
    include "../models/m_update.php";
    include "../models/m_list.php";
    $connection = new Database($host, $user, $pass, $database);
    $upd = new Update($connection);

    $id_upd = $_POST['id_upd'];
    $title = $connection->conn->real_escape_string($_POST['title_list']);
    $episode = $connection->conn->real_escape_string($_POST['eps']);
    $embed = $connection->conn->real_escape_string($_POST['emb']);

    $pict = $_FILES['gbr_prv']['name'];
    $extensi = explode(".", $_FILES['gbr_prv']['name']);
    $gbr_prv = "prv-".round(microtime(true)).".".end($extensi);
    $sumber = $_FILES['gbr_prv']['tmp_name'];

    if($pict == ""){
      $upd->edit("UPDATE tb_update SET title_list = '$title', episode = '$episode', embed_link = '$embed' WHERE no = '$id_upd'");
      echo "<script>window.location='?page=update';</script>";
    }else{
      $gbr_awal = $upd->tampil($id_upd)->fetch_object()->preview;
      unlink("../assets/img/preview/".$gbr_awal);
  
      $upload = move_uploaded_file($sumber, "../assets/img/preview/".$gbr_cvr);
  
      if($upload){
          $upd->edit("UPDATE tb_update SET title_list = '$title', episode = '$episode', preview = '$gbr_prv', embed_link = '$embed' WHERE no = '$id_upd'");
        echo "<script>
              alert('Edit Success');
              window.location='?page=update';
              </script>";
      } else {
          echo "<script>
                alert('Upload Gambar Gagal');
                window.location='?page=update';<?script>";
      }
    }
?>