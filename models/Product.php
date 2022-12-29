<?php

class Product {
    public $id;
    public $product_name;
    public $category;
    public $price;
    public $unit;
    public $sold_off;
    public $date_start;
    public $date_end;
    public $province;
    public $city;
    public $description;
    public $image;

    public function generateImageName() {
        return bin2hex(random_bytes(60)) . ".jpeg";
    }
}


interface ProductDaoInterface {
    public function buildProduct($data);
    public function getLatestProducts();
    public function getProductsByCategory($category);
    public function getProductsByUserId($id);
    public function findById($id);
    public function findByTitle($title);
    public function findAll();
    public function create(Product $product);
    public function update(Product $product);
    public function destroy($id);
}