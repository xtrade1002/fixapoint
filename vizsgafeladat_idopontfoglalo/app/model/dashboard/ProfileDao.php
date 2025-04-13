<?php

namespace app\model\dashboard;

use app\model\ICrudDao;
use app\_utils\Database as Db;

require_once __DIR__ . '/../../_utils/Database.php';
require_once __DIR__ . '/../ICrudDao.php';
require_once __DIR__ . '/Profile.php';

class ProfileDao implements ICrudDao
{
    public function getAll()
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $statement = $connection->prepare("SELECT * FROM users");
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        return $statement->fetchAll();    
    }

    public function save($profile): void
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
    
        $sql = "INSERT INTO users (fullName, companyName, email, phone, password) VALUES (:fullName, :companyName, :email, :phone, :password)";
        
        $statement = $connection->prepare($sql);
        $statement->execute([
            ':fullName' => $profile->getFullName(),
            ':companyName' => $profile->getCompanyName(),
            ':email' => $profile->getEmail(),
            ':phone' => $profile->getPhone(),
            ':password' => $profile->getPassword()
        ]);
    }
    

    public function getById(int $id)
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $statement = $connection->prepare("SELECT * FROM users WHERE id = :id");
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute([':id' => $id]);
        return $statement->fetch();
    }

    public function update($profile): void
    {
        echo "Update metódus meghívva!<br>";
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
    
        if (!empty($profile->getPassword())) {
            $sql = "UPDATE users SET fullName = :fullName,companyName = :companyName,email = :email, phone = :phone, password = :password WHERE id = :id";
            $params = [
                ':fullName' => $profile->getFullName(),
                ':companyName' => $profile->getCompanyName(),
                ':email' => $profile->getEmail(),
                ':phone' => $profile->getPhone(),
                ':password' => $profile->getPassword(),
                ':id' => $profile->getId()
            ];
        } else { 
            $sql = "UPDATE users SET fullName = :fullName, companyName = :companyName, email = :email, phone = :phone WHERE id = :id";
            $params = [
                ':fullName' => $profile->getFullName(),
                ':companyName' => $profile->getCompanyName(),
                ':email' => $profile->getEmail(),
                ':phone' => $profile->getPhone(),
                ':id' => $profile->getId()
            ];
        }
    
        $statement = $connection->prepare($sql);
        $statement->execute($params);
    }
    
    

    public function delete($id): void
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "DELETE FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->execute([
            ':id' => $id->getId()
        ]);
    }
    
}
