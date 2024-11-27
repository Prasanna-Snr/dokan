<?php
class Product {
    public int $product_id;
    public string $name;
    public string $category;
    public string $image_path;
    public string $description;
    public int $price;
    public int $offer;
    public int $discount;
    public string $created_at;

    public function __construct(
        int $product_id,
        string $name,
        string $category,
        string $image_path,
        string $description,
        int $price,
        int $offer = 0,
        int $discount = 0,
        string $created_at = ''
    ) {
        $this->product_id = $product_id;
        $this->name = $name;
        $this->category = $category;
        $this->image_path = $image_path;
        $this->description = $description;
        $this->price = $price;
        $this->offer = $offer;
        $this->discount = $discount;
        $this->created_at = $created_at ?: date("Y-m-d H:i:s");
    }
}
?>
