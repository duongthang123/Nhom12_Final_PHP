<?php

require_once("app/Model/Model.php");

class Category extends Model 
{
    protected $table = 'category';

    public function all()
    {
        $sql = "SELECT * FROM category ";

        $result = $this->dbConnection->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function get()
    {
        $sql = "SELECT * FROM category order by id DESC";

        $result = $this->dbConnection->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function findCategoryById($idCategory)
    {
        $sql = "SELECT * FROM category WHERE id = $idCategory";

        $result = $this->dbConnection->query($sql);


        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data)
    {
        $name = $data['name'];

        $sql = "INSERT INTO category(name) VALUES ('$name')";

        return $this->dbConnection->query($sql);
    }

    public function edit($id)
    {
        $sql = "SELECT * FROM category WHERE id = $id";
        $result = $this->dbConnection->query($sql);

        return $result->fetch_assoc();
    }

    public function update($data, $id)
    {
        $name = $data['name'];

        $sql = "UPDATE category SET name = '$name' WHERE id = $id";

        $result = $this->dbConnection->query($sql);
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM category WHERE id = $id";
        $result = $this->dbConnection->query($sql);
        return $result;
    }

}