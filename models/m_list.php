<?php 
    class Alist{
        private $mysqli;

        function __construct($conn)
        {
            $this->mysqli = $conn;
        }

        public function tampil($id = null){
            $db = $this->mysqli->conn;
            $sql = "SELECT *FROM tb_list";
            if($id != null){
                $sql = " WHERE id_list = $id";
            }

            $query = $db->query($sql) or die ($db->error);
            return $query;
        }

        public function tambah($title, $rate, $status, $gambar, $type, $total, $aired, $durasi, $sinopsis, $lgenre){
            $db = $this->mysqli->conn;
            $db->query("INSERT INTO tb_list values('','$title','$rate','$status','$gambar','$type','$total','$aired','$durasi','$sinopsis','$lgenre')")
            or die($db->error);
        }
    }
?>