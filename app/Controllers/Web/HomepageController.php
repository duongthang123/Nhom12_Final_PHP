<?php

require_once("app/Model/Product.php");
require_once("app/Model/Category.php");

class HomepageController {

    private $product;
    private $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function index() 
    {
        $target_file = "public/assets/admin/img/";
        $products = $this->product->getNewProduct();
        $bestSellProducts = $this->product->bestSellProducts();
        $productPk = $this->product->getNewProductByPK();
        
        $categories = $this->category->all();
        require_once("views/web/homepage/index.php");
        
    }

}