<?php
    include_once 'db-connect.php';
    class Customer{ 
        public $dbTable;
        public $conn;
        
        public function __construct(){
            $db = new DbConnect();
            $this->conn = $db->getDb();
            $this->$dbTable = "customers";
        }     
        
        public function checkCustomer($email, $password){
            $json = array();
            $query = "select * from ".$this->$dbTable." where email = '".$email."' limit 1";
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
            $query = "insert into ".$this->$dbTable."(name, email, password, created_at, updated_at) values('".$name."','".$email."','".$hashPassword."','".$date."','".$date."')";
            $result = mysqli_query($this->conn,$query);
            $customer=null;
            if($result==1){
                $query = "select * from ".$this->$dbTable." where email = '$email' limit 1";
                $result = mysqli_query($this->conn, $query);
                $customer = $result->fetch_assoc();
            }
            return $customer;
        }

        public function customerExists($email){            
            $query = "select * from ".$this->$dbTable." where email = '$email' limit 1";
            $result = mysqli_query($this->conn, $query);
            if(mysqli_num_rows($result)>0)
                return true;
            else
                return false;
        }

        public function updatePassword($email, $password){
            $json = array();
            $hashPassword = password_hash($password,PASSWORD_DEFAULT);
            $query = "update ".$this->$dbTable." set password = '".$hashPassword."' where email = '".$email."'";
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

        public function updateProfile($name, $email, $customer_id, $photo){
            $json = array();
            $filename=null;
            if($photo!="No"){
                $filename = date("d-m-y-").str_replace(" ","-",$name).".jpg";
                $path = "images/customer-images/".date("d-m-y-").str_replace(" ","-",$name).".jpg";
                if(file_put_contents($path,base64_decode($photo))){
                    $query = "select * from ".$this->$dbTable." where customer_id = '.$id.' limit 1";
                    $result = mysqli_query($this->conn, $query);
                    if(!is_null($result->photo) || !strcmp($result->photo,"")){
                        $this->deletePhoto($result->photo);
                        $query = "update ".$this->$dbTable." set name = '".$name."', email = '".$email."', photo = '".$filename."' where customer_id = '".$customer_id."'";
                    }                    
                }
                else{
                    $json["status"] = "error";
                    $json["message"] = "Profile photo couldn't be updated";
                    return $json;
                }
            }
            else{
                $query = "update ".$this->$dbTable." set name = '".$name."', email = '".$email."' where customer_id = '".$customer_id."'";
            }
            $update = mysqli_query($this->conn,$query);
            if($update==1){
                $json["status"] = "success";
                $json["message"] = "Profile Updated Successfully.";
                $json["name"] = $name;
                $json["email"] = $email;
                if(is_null($filename)){
                    $json["photo"] = null;
                }
                else{
                    $json["photo"] = $filename;
                }
            }
            else{
                $json["status"] = "error";
                $json["message"] = "Profile details couldn't be updated";
            }
            return $json;
        }

        public function deletePhoto($name){
            $path = "images/customer-images/".$name;
            if(file_exists($path)){
                unlink($path);
                return true;
            }
            else{
                return false;
            }
        }

        public function updatePhotoNull($customer_id){
            $query = "update ".$this->$dbTable." set photo = null where customer_id = ".$customer_id;
            mysqli_query($this->conn,$query);
        }

        public function getCustomerDetails($customer_id){
            $query = "select * from ".$this->$dbTable." where customer_id = ".$customer_id." limit 1";
            $result = mysqli_query($this->conn,$query);
            $customer = $result->fetch_assoc();
            return $customer;
        }
    }
?>