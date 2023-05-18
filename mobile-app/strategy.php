<?php
    include_once 'db-connect.php';
    class StrategyShort{
        private $dbTable = "strategy_short";
        public $conn;
        
        public function __construct(){
            $db = new DbConnect();
            $this->conn = $db->getDb();
        }

        public function getStrategies(){
            $json = array();
            $query = "select * from strategy_short order by updated_at desc";
            $result = mysqli_query($this->conn, $query);
            while($row =mysqli_fetch_assoc($result)){
                $json[] = $row;
            }
            return $json;
        }
    }
?>