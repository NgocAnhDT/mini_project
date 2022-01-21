<?php
//models/Product.php
require_once 'models/Model.php';

class User extends Model {

    public function check_login($username, $password){
        $stmt = $this->connection->prepare("SELECT * from admins WHERE username=? LIMIT 1");
        $stmt->bindValue(1, $username, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashedPassword = $row['password'];
        if (password_verify($password, $hashedPassword)){
            return $row;
        } else {
            return false;
        }
    }
}