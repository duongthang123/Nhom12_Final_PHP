<?php

require_once ("app/Model/Model.php");

class Product extends Model
{
    protected $table = 'product';

    public function all() 
    {
        $sql =  "SELECT * FROM product order by id DESC";

        $result = $this->dbConnection->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function searchProduct($key)
    {
        $sql = "SELECT product.id, product.name,  product.img, product.price, category.id AS 'category_id' FROM product INNER JOIN category on product.category_id = category.id 
                WHERE product.name LIKE '%$key%' OR price LIKE '%$key%' OR category.name LIKE '%$key%'";
        $result = $this->dbConnection->query($sql);
        
        return $result->fetch_all(MYSQLI_ASSOC);    
    }

    public function searchProductAd($searchValue)
    {
        $sql = "SELECT * FROM product WHERE id LIKE '%$searchValue%' OR name LIKE '%$searchValue%'";
        $result = $this->dbConnection->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductForShop($limit = 16)
    {
        $sql = "SELECT * FROM product LIMIT $limit";

        $result = $this->dbConnection->query($sql);


        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductById($product_id)
    {
        $sql = "SELECT product.id, product.category_id, product.img,
        product.price, product.quantity, product.description, product.name AS 'product_name', category.name AS 'category_name' 
        
        FROM product INNER JOIN category on product.category_id = category.id WHERE product.id = $product_id";

        $result = $this->dbConnection->query($sql);

        // print_r($result->fetch_assoc());die();
        return $result->fetch_assoc();
    }

    public function getProductByCategory($category_id)
    {
        $sql = "SELECT * FROM product WHERE category_id = $category_id";

        $result = $this->dbConnection->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNewProduct($limit = 4)
    {
        $sql = "SELECT * FROM product order by id DESC LIMIT $limit";

        $result = $this->dbConnection->query($sql);


        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNewProductByPK($limit = 4)
    {
        $sql = "SELECT * FROM product  WHERE category_id = 6 LIMIT $limit";

        $result = $this->dbConnection->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    
    public function create($data)
    {
        $category_id = $data['category_id'];
        $name = $data['name'];
        $description = $data['description'];
        $price = $data['price'];
        $quantity = $data['quantity'];
        
        //upload img
        $target_dir = "public/assets/admin/img/";
        $file_name = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $target_dir.$file_name);
        //end upload

        $sql = "INSERT INTO product(category_id, name, description, price, quantity, img, created_at) VALUES ($category_id, '$name', '$description', $price, $quantity, '$file_name', NOW());";
        return $this->dbConnection->query($sql);
        

    }

    public function edit($id) 
    {
        $sql = "SELECT * FROM product  WHERE id = $id";

        $result = $this->dbConnection->query($sql);

        return $result->fetch_assoc();
    }

    public function see($id) 
    {
        $sql = "SELECT * FROM product  WHERE id = $id";

        $result = $this->dbConnection->query($sql);
        
        return $result->fetch_assoc();
    }

    public function update($data, $id)
    {
        $category_id = $data['category_id'];
        $name = $data['name'];
        $description = $data['description'];
        $price = $data['price'];
        $quantity = $data['quantity'];
        // $img = $data['img'];

        //upload img
        $target_dir = "public/assets/admin/img/";
        $file_name = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $target_dir.$file_name);
        //end upload
        $sql = "UPDATE product SET category_id = $category_id, name = '$name', description = '$description', price = $price, quantity = $quantity, img = '$file_name', updated_at = NOW() WHERE id = $id";
    
        $result = $this->dbConnection->query($sql);

        return $result;
    }

    public function delete($id) 
    {
        $sql = "DELETE FROM product WHERE id = $id";

        $result = $this->dbConnection->query($sql);

        return $result;
    }

    public function bestSellProducts($limit = 4)
    {
        $sql = "SELECT * FROM product order by soldQuantity DESC LIMIT $limit";

        $result = $this->dbConnection->query($sql);


        return $result->fetch_all(MYSQLI_ASSOC);
    }
}