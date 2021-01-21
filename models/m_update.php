<?php 
    class Update{
        private $mysqli;

        function __construct($conn)
        {
            $this->mysqli = $conn;
        }

        public function tampil($id = null){
            $db = $this->mysqli->conn;
            $sql = "SELECT *FROM tb_update INNER JOIN tb_list
            on tb_update.title_list = tb_list.title_list";
            if($id != null){
                $sql - " WHERE id_update = $id";
            }

            $query = $db->query($sql) or die ($db->error);
            return $query;
        }

        public function tambah($title, $episode){
            $db = $this->mysqli->conn;
            $db->query("INSERT INTO tb_update values('','$title','$episode')") or die($db->error);
        }
    }
?>