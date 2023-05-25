<?php
    include_once 'db-connect.php';
    class Feedback{ 
        public $dbTable="feedbacks";
        public $conn;

        public function __construct(){
            $db = new DbConnect();
            $this->conn = $db->getDb();
            $this->$dbTable = "feedbacks";
        }

        public function checkFeedback($customer_id){
            $query = "select * from ".$this->$dbTable." where user_id = ".$customer_id;
            $result = mysqli_query($this->conn, $query);
            if(mysqli_num_rows($result)>0){
                return true;
            }
            else{
                return false;
            }
        }

        public function queryFeedback($customer_id, $rating, $feedback, $anonymous, $operation){
            $query="";
            $date = date('Y-m-d H:i:s');
            if($operation=="insert"){
                $query = "insert into ".$this->$dbTable."(user_id, rating, feedback, anonymous, created_at, updated_at) values(".$customer_id.",".$rating.",'".$feedback."','".$anonymous."','".$date."','".$date."')";
            }
            else{
                $query = "update ".$this->$dbTable." set rating=".$rating.", feedback='".$feedback."', anonymous='".$anonymous."', updated_at='".$date."' where user_id=".$customer_id;
            }
            return $query;
        }

        public function saveFeedback($query){
            $result = mysqli_query($this->conn, $query);
            return $result;
        }

        public function testimonials(){
            $query = "select c.name as name, c.photo as photo, f.rating as rating, f.feedback as feedback, f.anonymous as anonymous from ".$this->$dbTable." f, customers c where f.user_id = c.customer_id order by f.updated_at desc";
            $result = mysqli_query($this->conn, $query);
            while($row =mysqli_fetch_assoc($result)){
                $json[] = $row;
            }
            return $json;
        }
    }
?>