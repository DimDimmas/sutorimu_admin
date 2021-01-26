<?php 
  require_once('../config/koneksi.php');
  require_once('../models/database.php');
  include "../models/m_genre.php";
  $connection = new Database($host, $user, $pass, $database);
  $grn = new Genre($connection);

  $id_grn = @$_POST['id_grn'];
  $genre = $connection->conn->real_escape_string(@$_POST['title_grn']);

  $grn->edit("UPDATE tb_genre SET title_genre = '$genre' WHERE id_genre = '$id_grn'");
  echo "<script>window.location='?page=genre';</script>";
?>