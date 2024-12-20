<?php 
include "dbcon.php";
class Admin{
    public $fullname,$username, $email,$password;

    // paramaterize constructor
    public function __construct($fullname = "", $username = "", $email = "", $password = ""){
        $this->fullname = $fullname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
}

// interface 
interface AdminCrud{
    public function addAdmin($fullname, $username, $email, $password);
    public function loginAdmin($email,$password);
    public function getTotalCustomers();
    public function getTotalProducts();
    public function getTotalCategories();
    public function getTotalOrder();
}

// implementation of interface
class AdminCrudImpl implements AdminCrud{ 
    private $conn;

    // constructor
    public function __construct(){
        global $conn;
        $this->conn=$conn;
    }


    public function addAdmin($fullname, $username, $email, $password){
        $hashPwd = sha1($password);
        $query ="INSERT INTO tbl_admin (fullname, username,email,password) VALUES ('$fullname', '$username', '$email','$hashPwd')";
        mysqli_query($this->conn,$query);
        return true;
    }


    public function loginAdmin($email, $password) {
        $hashPwd = sha1($password);
        $query = "SELECT id, email, password FROM tbl_admin WHERE email='$email'";
        $result = mysqli_query($this->conn, $query);
            while($row = mysqli_fetch_assoc($result)) {
                if($email == $row['email'] && $hashPwd == $row['password']) {
                    $_SESSION['user_login'] = $row['id'];
                    return true; 
                }
            }
        return false;  
    }


    public function getTotalCustomers() {
        $query = "SELECT COUNT(*) AS total_customer FROM tbl_customer";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['total_customer'];
    }


    public function getTotalProducts() {
        $query = "SELECT COUNT(*) AS total FROM tbl_product";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }


    public function getTotalCategories() {
        $query = "SELECT COUNT(*) AS total_categories FROM tbl_categories";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['total_categories'];
    }

    public function getTotalOrder() {
        $query = "SELECT COUNT(*) AS total_order FROM tbl_order";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['total_order'];
    }
}
?>