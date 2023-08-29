<?php

require_once("app/Model/Category.php");
require_once("app/Model/Product.php");
require_once("app/requests/admin/ProductRequest.php");

class ProductController
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $product = new Product();
        $products = $product->all();
        $target_file = "public/assets/admin/img/";
        require "views/admin/dsSanPham/index.php";
    }

    public function search()
    {
        $target_file = "public/assets/admin/img/";
        $searchValue = $_POST['searchValue'];
        $products = $this->product->searchProductAd($searchValue);
        require "views/admin/dsSanPham/index.php";

    }

    public function see()
    {
        $id = $_GET['id'];
        $product = new Product();
        $target_file = "public/assets/admin/img/";
        $product = $product->see($id);
        $img = $target_file . $product['img'];
        require_once("views/admin/xemSP/index.php");
    }

    public function create()
    {

        $category = new Category();
        $categories = $category->all();
        require "views/admin/themSanPham/create.php";
    }

    public function store()
    {
        $product = new Product();
        if (isset($_POST['add_product'])) {
            $productRequest = new ProductRequest();
            $productErrors = $productRequest->VilidateProduct($_POST);
            if (count($productErrors) == 0) {
                $result = $product->create($_POST);

                if ($result) {
                    header("location: index.php?controller=product&action=index&module=admin");
                }
            } else {
                $category = new Category();
                $categories = $category->all();
                require_once "views/admin/themSanPham/create.php";
            }
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $product = $this->product->edit($id);
        // print_r($product);die();
        $target_file = "public/assets/admin/img/";

        $category = new Category();
        $categories = $category->all();
        require_once("views/admin/suaSP/edit.php");
    }

    public function update()
    {
        if (isset($_POST['edit_product'])) {
            $productRequest = new ProductRequest();
            $productErrors = $productRequest->VilidateProduct($_POST);

            if (count($productErrors) == 0) {
                $id = $_GET['id'];
                $product = new Product();
                $result = $product->update($_POST, $id);

                if ($result) {
                    header("location: index.php?controller=product&action=index&module=admin");
                }
            } else {
                $category = new Category();
                $categories = $category->all();
                require_once "views/admin/suaSP/edit.php";
            }
        }
    }

    public function delete()
    {
        $id = $_GET['id'];

        $product = new Product();

        $result = $product->delete($id);

        if ($result) {
            header("location: index.php?controller=product&action=index&module=admin");
        }
    }
}