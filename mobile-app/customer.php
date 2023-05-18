<?php
    include_once 'db-connect.php';
    class Customer{ 
        private $dbTable = "customers";
        public $conn;
        
        public function __construct(){
            $db = new DbConnect();
            $this->conn = $db->getDb();
        }     
        
        public function checkCustomer($email, $password){
            $json = array();
            $query = "select * from customers where email = '$email' limit 1";
            $result = mysqli_query($this->conn, $query);
            if(mysqli_num_rows($result)>0){
                $customer = $result->fetch_assoc();
                if(password_verify($password,$customer["password"])){
                    $json["status"] = "success";
                    $json["customer"] = $customer;
                }
                else{
                    $json["status"] = "error";
                    $json["message"] = "Passwords do not match";
                }
            }
            else{
                $json["status"] = "error";
                $json["message"] = "Email Id does not exists";
            }
            return $json;
        }

        public function saveCustomer($name, $email, $password){
            $hashPassword = password_hash($password,PASSWORD_DEFAULT);
            $date = date('Y-m-d H:i:s');
            $query = "insert into customers(name, email, password, created_at, updated_at) values('".$name."','".$email."','".$hashPassword."','".$date."','".$date."')";
            $result = mysqli_query($this->conn,$query);
            $customer=null;
            if($result==1){
                $query = "select * from customers where email = '$email' limit 1";
                $result = mysqli_query($this->conn, $query);
                $customer = $result->fetch_assoc();
            }
            return $customer;
        }

        public function customerExists($email){            
            $query = "select * from customers where email = '$email' limit 1";
            $result = mysqli_query($this->conn, $query);
            if(mysqli_num_rows($result)>0)
                return true;
            else
                return false;
        }

        public function updatePassword($email, $password){
            $json = array();
            $hashPassword = password_hash($password,PASSWORD_DEFAULT);
            $query = "update customers set password = '".$hashPassword."' where email = '".$email."'";
            $result = mysqli_query($this->conn, $query);            
            return $result;
        }

        public function addOtp($type,$otp){
            $querySelect = "select * from otp where type = '".$type."'";
            $selectResult = mysqli_query($this->conn, $querySelect);
            if(mysqli_num_rows($selectResult)>0){
                $query = "update otp set otp = '".$otp."' where type = '".$type."'";
            }
            else{
                $query = "insert into otp(type,otp) values ('".$type."',".$otp.")";
            }            
            $insert = mysqli_query($this->conn,$query);
            return $insert;
        }

        public function verifyOtp($type,$otp){
            $querySelect = "select * from otp where type = '".$type."' and otp=".$otp;
            $selectResult = mysqli_query($this->conn, $querySelect);
            if(mysqli_num_rows($selectResult)>0){
                $deleteQuery = "delete from otp where type = '".$type."'";
                mysqli_query($this->conn,$deleteQuery);
                return true;
            }
            else{
                return false;
            }
        }

        public function updateProfile($name, $email, $customer_id){
            $query = "update customers set name = '".$otp."', email = '".$email."' where customer_id = '".$customer_id."'";
            $update = mysqli_query($this->conn,$query);
            return $update;
        }
    }
?>