<?php 
    class Genre{
        private $mysqli;

        function __construct($conn)
        {
            $this->mysqli = $conn;
        }

        public function tampil($id = null){
            $db = $this->mysqli->conn;
            $sql = "SELECT *FROM tb_genre";
            if($id != null){
                $sql .= " WHERE id_genre = $id";
            }

            $query = $db->query($sql) or die ($db->error);
            return $query;
        }

        public function tambah($genre){
            $db = $this->mysqli->conn;
            $db->query("INSERT INTO tb_genre values('','$genre')") or die($db->error);
        }

        public function edit($sql){
            $db = $this->mysqli->conn;
            $db->query($sql) or die($db->error);
        }

        public function hapus($id){
            $db = $this->mysqli->conn;
            $db->query("DELETE FROM tb_genre WHERE id_genre = '$id'") or die($db->error);
        }

        function __destruct(){
            $db = $this->mysqli->conn;
            $db->close();
        }
    }
    
?>