<?php
include "dbcon.php";
interface HeroSectionCrud{
    public function addHeroSection($main_title,$description,$image_path);
    public function deleteHeroSection($id);
    public function updateHeroSection($id,$main_title,$description,$image_path);

    // public function getAllProduct();
    // public function getOfferProduct();
    // public function highPriceProduct();
    // public function lowPriceProduct();
    // public function getById($id);

}


class HeroSectionCrudImpl implements HeroSectionCrud{
    private $conn;

    // constructor
    public function __construct(){
        global $conn;
        $this->conn=$conn;
    }

    public function addHeroSection($main_title,$description,$image_path){
        $sql = "INSERT INTO hero_section (main_title, description, image_path) 
        VALUES ('$main_title', '$description', '$image_path')";
        $result = mysqli_query($this->conn, $sql);
        return true;
    }

    public function deleteHeroSection($id){
        $sql = "DELETE FROM hero_section WHERE id=$id";
        mysqli_query($this->conn, $sql);
        return true;
    }


    public function updateHeroSection($id,$main_title,$description,$file_path) {
        $sql = "UPDATE hero_section SET main_title='$main_title', description='$description',image_path='$file_path' WHERE id=$id";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }


}
?>