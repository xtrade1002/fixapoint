<?php
namespace app\dao;
use app\_utils\Database as Db;


class UserDao implements ICrudDao {

    public function getAll() {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "SELECT * FROM users ORDER BY id";
        $statement = $connection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function save($user): void {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "INSERT INTO users (name, email, password, is_admin) VALUES (:name, :email, :password, :is_admin)";
        $statement = $connection->prepare($sql);
        $hashedPassword = password_hash($user->password, PASSWORD_DEFAULT);
    
        $statement->bindParam(':name', $user->name);
        $statement->bindParam(':email', $user->email);
        $statement->bindParam(':password', $hashedPassword);
        $statement->bindParam(':is_admin', $user->is_admin);
        $statement->execute();
    }
    

    public function getById(int $id) {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "SELECT * FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        return $statement->fetch();
    }

    public function update($user): void  {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "UPDATE users SET name = :name, email = :email, password = :password, is_admin = :is_admin WHERE id = :id";
        $statement = $connection->prepare($sql);
        $hashedPassword = password_hash($user->password, PASSWORD_DEFAULT);
    
        $statement->bindParam(':name', $user->name);
        $statement->bindParam(':email', $user->email);
        $statement->bindParam(':password', $hashedPassword);
        $statement->bindParam(':id', $user->id); 
        $statement->execute();
    }
    

    public function delete($user): void {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "DELETE FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $user->id); 
        $statement->execute();
    }
    

    public function findByEmail($email) {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "SELECT * FROM users WHERE email = :email";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        return $statement->fetch();
    }


    public function register($user): void {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $statement = $connection->prepare($sql);
        $hashedPassword = password_hash($user->password, PASSWORD_DEFAULT);
    
        $statement->bindParam(':name', $user->name);
        $statement->bindParam(':email', $user->email);
        $statement->bindParam(':password', $hashedPassword);
        $statement->execute();
    }
    
    

    public function login($email, $password) {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "SELECT * FROM users WHERE email = :email";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        $user = $statement->fetch();
        if ($user && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }

    public function checkLogin($email, $password) {
        return $this->login($email, $password);
    }
    

    public function isAdmin($id) {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "SELECT is_admin FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        $result = $statement->fetch();
        return $result && $result->is_admin;
    }
}

?>