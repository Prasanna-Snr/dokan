<?php
class Product {
    public string $name;
    public string $category;
    public string $file_path;
    public string $description;
    public int $price;
    public int $offer;
    public int $discount;
    public string $created_at;
    public int $quantity;

    public function __construct(
        string $name="",
        string $category="",
        string $file_path="",
        string $description="",
        int $price=0,
        int $offer = 0,
        int $discount = 0,
        string $created_at = '',
        int $quantity=1
    ) {
        $this->name = $name;
        $this->category = $category;
        $this->file_path = $file_path;
        $this->description = $description;
        $this->price = $price;
        $this->offer = $offer;
        $this->discount = $discount;
        $this->created_at = $created_at ?: date("Y-m-d H:i:s");
        $this->quantity= $quantity;
    }
}


interface ProductCrud{
    public function addProduct($name,$category,$file_path,$description,$price,$offer,$discount, $quantity);
    public function deleteProduct($id);
    public function updateProduct($id, $name, $category, $file_path, $description, $price, $offer, $discount, $quantity);
    public function getAllProduct();
    public function getOfferProduct();
    public function highPriceProduct();
    public function lowPriceProduct();
    public function getById($id);

}

class ProductCrudImpl implements ProductCrud{
    private $conn;

    public function __construct(){
        global $conn;
        $this->conn=$conn;
    }



    public function addProduct($name,$category,$file_path,$description,$price,$offer,$discount,$quantity){
        $sql = "INSERT INTO tbl_product (name, category, image_path, description, price, offer, discount,quantity) 
        VALUES ('$name', '$category', '$file_path', '$description', '$price', '$offer', '$discount','$quantity')";
        $result = mysqli_query($this->conn, $sql);
        return true;
    }


    Public function deleteProduct($id){
        $sql = "DELETE FROM tbl_product WHERE id=$id";
        mysqli_query($this->conn, $sql);
        return true;
    }



    public function updateProduct($id, $name, $category, $file_path, $description, $price, $offer, $discount,$quantity) {
        $sql = "UPDATE tbl_product 
                SET name='$name', 
                    category='$category', 
                    image_path='$file_path', 
                    description='$description', 
                    price='$price', 
                    offer='$offer', 
                    discount='$discount',
                    quantity = '$quantity'
                WHERE id=$id";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function getAllProduct(){
        $query = "SELECT id, name, category, image_path, description, price, discount, offer FROM tbl_product";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }


    public function getOfferProduct(){
        $query = "SELECT * FROM tbl_product WHERE offer > 0";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }


    public function highPriceProduct(){
        $query = "SELECT * FROM tbl_product WHERE price > 100";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }


    public function lowPriceProduct(){
        $query = "SELECT * FROM tbl_product WHERE price < 100";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    public function getById($id) {
        $query = "SELECT * FROM tbl_product WHERE id = $id";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

}
?>
