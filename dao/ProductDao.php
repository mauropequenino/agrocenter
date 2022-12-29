<?php

require_once("models/Product.php");
require_once("models/Message.php");

class ProductDao implements ProductDaoInterface {

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url)
    {
        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function buildProduct($data) {
        $product = new Product();

        $product->id = $data["id"];
        $product->product_name = $data["product_name"];
        $product->category = $data["category"];
        $product->price = $data["price"];
        $product->unit = $data["unit"];
        $product->sold_off = $data["sold_off"];
        $product->date_start = $data["date_start"];
        $product->date_end = $data["date_end"];
        $product->province = $data["province"];
        $product->city = $data["city"];
        $product->description = $data["description"];
        $product->image = $data["image"];
        $product->users_id = $data["users_id"];

        return $product;
    }

    public function getLatestProducts() {

    }

    public function getProductsByCategory($category) {

    }

    public function getProductsByUserId($id) {
        $products = [];

        $stmt = $this->conn->prepare("SELECT * FROM products WHERE users_id = :users_id");
        $stmt->bindParam(":users_id", $id);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $productArr = $stmt->fetchAll();

            foreach($productArr as $product) {
                $products[] = $this->buildProduct($product);
            }
        }

        return $products;
    }

    public function findById($id) {

    }

    public function findByTitle($title) {

    }

    public function findAll() {

    }

    public function create(Product $product) {
        $stmt = $this->conn->prepare("INSERT INTO products (
            product_name, category, price, unit, sold_off, date_start, date_end, province, city, description, image, users_id) VALUES (
                :product_name, :category, :price, :unit, :sold_off, :date_start, :date_end, :province, :city, :description, :image, :users_id
        )");

        $stmt->bindParam("product_name", $product->product_name);
        $stmt->bindParam("category", $product->category);
        $stmt->bindParam("price", $product->price);
        $stmt->bindParam("unit", $product->unit);
        $stmt->bindParam("sold_off", $product->sold_off);
        $stmt->bindParam("date_start", $product->date_start);
        $stmt->bindParam("date_end", $product->date_end);
        $stmt->bindParam("province", $product->province);
        $stmt->bindParam("city", $product->city);
        $stmt->bindParam("description", $product->description);
        $stmt->bindParam("image", $product->image);
        $stmt->bindParam("users_id", $product->users_id);

        $stmt->execute();

        $this->message->setMessage("Producto adicionado com sucesso", "success", "dashboard.php");
    }

    public function update(Product $product) {

    }

    public function destroy($id) {

    }
}
