<?php
    include_once 'db-connect.php';
    class StrategyShort{
        public $dbTable;
        public $conn;
        
        public function __construct(){
            $db = new DbConnect();
            $this->conn = $db->getDb();
            $this->$dbTable= "strategy_short";
        }

        public function getStrategies(){
            $json = array();
            $query = "select * from ".$this->$dbTable." where active='Yes' order by updated_at desc";
            $result = mysqli_query($this->conn, $query);
            while($row =mysqli_fetch_assoc($result)){
                $json[] = $row;
            }
            return $json;
        }
    }
?>