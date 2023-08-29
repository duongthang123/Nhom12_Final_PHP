<?php

require_once("app/Model/Product.php");
require_once("app/Model/Category.php");

class ProductController
{

    private $product;
    private $category;


    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }


    public function index()
    {
        $id = $_GET['category_id'];
        $categories = $this->category->all();
        $products = $this->product->getProductByCategory($id);
        require_once "views/web/product/product.php";
    }

    public function showProductByID()
    {
        $product_id = $_GET['product_id'];
        $id = $_GET['category_id'];

        $target_file = "public/assets/admin/img/";

        $categories = $this->category->all();
        $product = $this->product->getProductById($product_id);
        $products = $this->product->getProductByCategory($id);
        // print_r($products);die();
        require_once("views/web/product/product.php");
    }
}