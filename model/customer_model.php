<?php
include "../model/dbcon.php";
class Customer{
    public $fullname,$username, $email,$password;
    public function __construct($fullname="", $username="", $email="", $password=""){
        $this->fullname = $fullname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
}


interface CustomerCrud{
    public function addCustomer($fullname,$username,$email,$password);
    public function deleteCustomerById($id);
    public function loginCustomer($email, $password);
}

class CustomerCrudImpl implements CustomerCrud{
    private $conn;

    public function __construct(){
        global $conn;
        $this->conn=$conn;
    }

    public function addCustomer($fullname,$username,$email,$password){
        $hashPwd = sha1($password);
        $query ="INSERT INTO tbl_customer (fullname, username,email,password) VALUES ('$fullname', '$username', '$email','$hashPwd')";
        mysqli_query($this->conn,$query);
        return true;
    }


    public function deleteCustomerById($id){
        $sql = "DELETE FROM tbl_customer WHERE id=$id";
        mysqli_query($this->conn, $sql);
        return true;
    }


    public function loginCustomer($email, $password) {
        $hashPwd = sha1($password);
        $query = "SELECT id, email, password FROM tbl_customer WHERE email='$email'";
        $result = mysqli_query($this->conn, $query);
            while($row = mysqli_fetch_assoc($result)) {
                if($email == $row['email'] && $hashPwd == $row['password']) {
                    $_SESSION['user_login'] = $row['id'];
                    return true; 
                }
            }
        return false;  
    }
}
?>