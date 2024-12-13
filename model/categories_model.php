<?php 
include "dbcon.php";
class Category{
    public $c_name;

    public function __construct($c_name=""){
        $this->c_name=$c_name;
    }
}


interface categoryCrud{
    public function addCategories($c_name);
    public function deleteCategories($id);
    public function updateCategories($id,$c_name);
    // public function getAllCategories();
}


class categoryCrudImpl implements categoryCrud{
    private $conn;
    public function __construct(){
        global $conn;
        $this->conn=$conn;
    }


    public function addCategories($c_name){
        $sql = "INSERT INTO tbl_categories (c_name) VALUES ('$c_name')";
        $result = mysqli_query($this->conn, $sql);
        return true;
    }


    public function deleteCategories($id) {
        $sql = "DELETE FROM tbl_categories WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        return true; 
    }


    public function updateCategories($id,$c_name){
        $sql = "UPDATE tbl_categories SET c_name='$c_name' WHERE id = $id";
        $res = mysqli_query($this->conn, $sql);
        return true;
    }
}
?>