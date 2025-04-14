<?php
namespace app\dao;

use app\_utils\Database;

class UserDao
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getById($id)
{
    $connection = $this->db->getConnection();
    $stmt = $connection->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $stmt->setFetchMode(\PDO::FETCH_OBJ);
    return $stmt->fetch();
}


public function updateUser($id, $fullName, $companyName, $phone, $password = null)
{
    $connection = $this->db->getConnection();
    $passwordToUse = $password ? $password : $this->getCurrentPassword($id);

    $sql = "UPDATE users SET fullName = ?, companyName = ?, phone = ?, password = ? WHERE id = ?";
    $params = [$fullName, $companyName, $phone, $passwordToUse, $id];
    $statement = $connection->prepare($sql);
    return $statement->execute($params);
}


   
    public function deleteUser($id)
    {
        $connection = $this->db->getConnection();
        $sql = "DELETE FROM users WHERE id = ?";
        $statement = $connection->prepare($sql);
        return $statement->execute([$id]);
    }

    private function getCurrentPassword($id)
    {
        $connection = $this->db->getConnection();
        $sql = "SELECT password FROM users WHERE id = ?";
        $statement = $connection->prepare($sql);
        $statement->execute([$id]);
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        return $result['password'];
    }


}
