<?php 
    ob_start();
    require_once('../config/koneksi.php');
    require_once('../models/database.php');
  include "../models/m_update.php";
  include "../models/m_list.php";
  $connection = new Database($host, $user, $pass, $database);
  $upd = new Update($connection);
  $lst = new Alist($connection);

  $id_upd = $_POST['id_upd'];
  $title = $connection->conn->real_escape_string($_POST['title_list']);
  $episode = $connection->conn->real_escape_string($_POST['eps']);

  $upd->edit("UPDATE tb_update SET title_list = '$title', episode = '$episode' WHERE no = '$id_upd'");
  echo "<script>window.location='?page=update';</script>";

?>