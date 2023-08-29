<?php

require_once("app/Model/Category.php");
require_once("app/requests/admin/CategoryRequest.php");

    
class CategoryController
{

    private $category;

    public function __construct() 
    {
        $this->category = new Category();
    }

    public function index()
    {
        $category = new Category();
        $categories = $category->get();
        require "views/admin/danhMucSP/index.php";
    }

    public function create()
    {
        require "views/admin/themDanhMuc/create.php";
    }

    public function store()
    {
        $category = new Category();
        if(isset($_POST['btn_add'])) {
            $categoryRequest = new CategoryRequest();
            $categoryErrors = $categoryRequest->vilidateCategory($_POST);

            if(count($categoryErrors) == 0) {
                $result = $category->create($_POST);
                if($result){
                    header("location: index.php?controller=category&action=index&module=admin"); 
                }
            }else {
                require_once "views/admin/themDanhMuc/create.php";
            }
            
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $category = new Category();
        $category = $category->edit($id);

        require_once("views/admin/suaDanhMuc/edit.php");
    }

    public function update()
    {
        
        if(isset($_POST['btn_edit'])) {
            $categoryRequest = new CategoryRequest();
            $categoryErrors = $categoryRequest->vilidateCategory($_POST);
            if(count($categoryErrors) == 0) {
                $id = $_GET['id'];
                $category = new Category();
                $result = $category->update($_POST, $id);
                if($result) {
                    header("location: index.php?controller=category&action=index&module=admin"); 
                
                }
            } 
                require_once "views/admin/suaDanhMuc/edit.php";
            
            
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $category = new Category();

        $result = $category->delete($id);

        if($result) {
            header("location: index.php?controller=category&action=index&module=admin");
         }
    }
}