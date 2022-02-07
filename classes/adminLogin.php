<?php
session_start();
include("../lib/database.php");
include("../helpers/format.php");
if(isset($_SESSION['admin_login'])){
    if($_SESSION['admin_login'] == true){
        header("Location:index.php");
    }
}
class AdminLogin {
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function loginAdmin($user_name, $password){
        $user_name = $this->fm->validation($user_name);
        $password = $this->fm->validation($password);

        $user_name = mysqli_real_escape_string($this->db->link, $user_name);
        $password = mysqli_real_escape_string($this->db->link, $password);
        
        if(empty($user_name) || empty($password)){
            $alert = "Ko dk de rong";
            return $alert;
        }
        else{
            $query = "SELECT * FROM admin WHERE user_name = '$user_name' AND password = '$password'";
            $result = $this->db->select($query);
            if($result == true){
                $value = $result->fetch_assoc();
                $_SESSION['admin_login'] = true;
                $_SESSION['admin_name'] = $value['name'];
                $_SESSION['admin_id'] = $value['id'];
                $_SESSION['admin_email'] = $value['email'];
                header("Location:index.php");
            }else{
                $alert = "User va pass ko dung";
                return $alert;
            }
        }
    }
}