<?php
//models/Product.php
require_once 'models/Model.php';

class Product extends Model {
    public function insertData($datas = []){
        $sql_insert = "INSERT INTO products (product_name, product_img, brand, price, size, color) VALUES (:product_name, :product_img, :brand, :price, :size, :color)";
        $obj_insert = $this->connection->prepare($sql_insert);
        $inserts = [
            ':product_name' => $datas['product_name'],
            ':product_img' => $datas['product_img'],
            ':brand' => $datas['brand'],
            ':price' => $datas['price'],
            ':size' => $datas['size'],
            ':color' => $datas['color']
        ];

        return $obj_insert->execute($inserts);
    }

    public function listData() {
        $sql_select_all = "SELECT * FROM products";
        $obj_select_all = $this->connection->prepare($sql_select_all);

        $obj_select_all->execute();
        return $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($id){
        $sql_select_one = "SELECT * FROM products WHERE product_id = :product_id";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $selects = [
            'product_id' => $id
        ];
        $obj_select_one->execute($selects);
        return $obj_select_one->fetch(PDO::FETCH_ASSOC);
    }

    public function update($datas = []){
        $sql_update = "UPDATE products SET product_name = :product_name, product_img = :product_img, brand = :brand, price = :price, size = :size, color = :color WHERE product_id = :product_id";
        $obj_update = $this->connection->prepare($sql_update);
        $updates = [
            ':product_name' => $datas['product_name'],
            ':product_img' => $datas['product_img'],
            ':brand' => $datas['brand'],
            ':price' => $datas['price'],
            ':size' => $datas['size'],
            ':color' => $datas['color'],
            ':product_id' => $datas['product_id']
        ];

        return $obj_update->execute($updates);
    }

    public function delete($id){
        $sql_delete = "DELETE FROM products WHERE product_id = :product_id";
        $obj_delete = $this->connection->prepare($sql_delete);
        $deletes = [
            ':product_id' => $id
        ];
        return $obj_delete->execute($deletes);
    }
}
