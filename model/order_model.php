<?php 
    class Order {
        public int $id;
        public int $customer_id;
        public int $product_id;
        public int $quantity;
        public string $order_method;
        public string $fullname;
        public string $phone;
        public string $house_no;
        public string $region;
        public string $city;
        public string $street;
        public string $created_at;
    
        public function __construct(
            int $quantity = 0,
            string $order_method = "",
            string $fullname = "",
            string $phone = "",
            string $house_no = "",
            string $region = "",
            string $city = "",
            string $street = "",
            string $created_at = ""
        ) {
            $this->quantity = $quantity;
            $this->order_method = $order_method;
            $this->fullname = $fullname;
            $this->phone = $phone;
            $this->house_no = $house_no;
            $this->region = $region;
            $this->city = $city;
            $this->street = $street;
            $this->created_at = $created_at ?: date("Y-m-d H:i:s");
        }
    }

    interface OrderCrud {
        public function makeOrder($product_name, $quantity, $order_method, $fullname, $phone, $house_no, $region, $city, $street,$customer_id,$product_id);
    }


    class OrderCrudImpl implements OrderCrud {
        private $conn;
    
        public function __construct() {
            global $conn;
            $this->conn = $conn;
        }
    
      
        public function makeOrder($product_name, $quantity, $order_method, $fullname, $phone, $house_no, $region, $city, $street,$customer_id,$product_id) {
            $sql = "INSERT INTO tbl_order (product_name,quantity, order_method, fullname, phone, email, region, city, street,customer_id,product_id) 
                    VALUES ('$product_name', '$quantity', '$order_method', '$fullname', '$phone', '$house_no', '$region', '$city', '$street', '$customer_id', '$product_id')";
            mysqli_query($this->conn, $sql);

            $updateQuantitySql = "UPDATE tbl_product SET quantity = quantity - $quantity WHERE id = $product_id";
            mysqli_query($this->conn, $updateQuantitySql);

            return true;
        }


        
    }
?>