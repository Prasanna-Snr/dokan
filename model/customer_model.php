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
    // public addCustomer($fullname,$username,$email,$password);
    public function deleteCustomerById($id);
}

class CustomerCrudImpl implements CustomerCrud{
    private $conn;

    public function __construct(){
        global $conn;
        $this->conn=$conn;
    }
    public function deleteCustomerById($id){
        $sql = "DELETE FROM tbl_customer WHERE id=$id";
        mysqli_query($this->conn, $sql);
        return true;
    }
}
?>