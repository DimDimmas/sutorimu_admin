<?php 
    class Alist{
        private $mysqli;

        function __construct($conn)
        {
            $this->mysqli = $conn;
        }

        public function tampil($id = null){
            $db = $this->mysqli->conn;
            $sql = "SELECT *FROM tb_list ORDER BY id_list DESC";
            if($id != null){
                $sql .= " WHERE id_list = $id";
            }

            $query = $db->query($sql) or die ($db->error);
            return $query;
        }

        public function tambah($title, $rate, $status, $gbr_cvr, $type, $total, $aired, $durasi, $sinopsis, $chkgenre, $trailer){
            $db = $this->mysqli->conn;
            $db->query("INSERT INTO tb_list values('','$title','$rate','$status','$gbr_cvr','$type','$total','$aired','$durasi','$sinopsis','$chkgenre', '$trailer')")
            or die($db->error);
        }

        public function edit($sql){
            $db = $this->mysqli->conn;
            $db->query($sql) or die($db->error);
        }

        public function search(){
            $db = $this->mysqli->conn;
            $search = trim(mysqli_real_escape_string($db, $_POST['search']));
            $sql = "SELECT *FROM tb_list WHERE title_list LIKE  '%$search%'";

            $query = $db->query($sql) or die ($db->error);
            return $query;
        }
                
        public function hapus($id){
            $db = $this->mysqli->conn;
            $db->query("DELETE FROM tb_list WHERE id_list = '$id'") or die($db->error);
        }

    }
?>