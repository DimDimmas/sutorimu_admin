<?php 
    class Alist{
        private $mysqli;

        function __construct($conn)
        {
            $this->mysqli = $conn;
        }

        public function tampil($id = null){
            $db = $this->mysqli->conn;
            $sql = "SELECT *FROM tb_list ORDER BY id_list desc";
            if($id != null){
                $sql .= " WHERE id_list = $id";
            }

            $query = $db->query($sql) or die ($db->error);
            return $query;
        }

        public function tambah($title, $rate, $status, $gbr_cvr, $type, $total, $aired, $durasi, $sinopsis, $chkgenre){
            $db = $this->mysqli->conn;
            $db->query("INSERT INTO tb_list values('','$title','$rate','$status','$gbr_cvr','$type','$total','$aired','$durasi','$sinopsis','$chkgenre')")
            or die($db->error);
        }

        public function edit($sql){
            $db = $this->mysqli->conn;
            $db->query($sql) or die($db->error);
        }
                
        public function hapus($id){
            $db = $this->mysqli->conn;
            $db->query("DELETE FROM tb_list WHERE id_list = '$id'") or die($db->error);
        }

        public function show($id){
            $db = $this->mysqli->conn;
            $sql = "SELECT *FROM tb_list WHERE id_list = '$id'";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

        public function movie(){
            $db = $this->mysqli->conn;
            $sql = "SELECT *FROM tb_list WHERE type = 'Movie'";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

        public function tv(){
            $db = $this->mysqli->conn;
            $sql = "SELECT *FROM tb_list WHERE type = 'TV'";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

    }
?>