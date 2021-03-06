<?php 
    class Update{
        private $mysqli;

        function __construct($conn)
        {
            $this->mysqli = $conn;
        }

        public function tampil($id = null){
            $db = $this->mysqli->conn;
            $sql = "SELECT * FROM tb_update";
            if($id != null){
                $sql .=" WHERE no = $id";
            }

            $query = $db->query($sql) or die ($db->error);
            return $query;
        }

        public function tambah($title, $episode){
            $db = $this->mysqli->conn;
            $db->query("INSERT INTO tb_update values('','$episode','$title')") or die($db->error);
        }

        public function edit($sql){
            $db = $this->mysqli->conn;
            $db->query($sql) or die($db->error);
        }

        public function hapus($id){
            $db = $this->mysqli->conn;
            $db->query("DELETE FROM tb_update WHERE no = '$id'") or die($db->error);
        }
        
        public function tampilUpdate($limit_start, $limit){
            $db = $this->mysqli->conn;
            $sql = "SELECT *FROM tb_list, tb_update where tb_list.title_list = tb_update.title_list ORDER BY no DESC limit $limit_start, $limit";

            $query = $db->query($sql) or die ($db->error);
            return $query;
        }

        public function show($title){
            $db = $this->mysqli->conn;
            $sql = "SELECT *FROM tb_update WHERE title_list = '$title'";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

    }
?>