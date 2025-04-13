<?php
namespace app\model;
require_once(__DIR__ . '/../_utils/Database.php');
require_once(__DIR__ . '/ICrudDao.php');
require_once(__DIR__ . '/User.php');

use app\model\User;
use app\_utils\Database as Db;
use app\model\ICrudDao;



class UserDao implements ICrudDao
{
    public function getAll()
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "SELECT * FROM users ORDER BY id";
        $statement = $connection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function save($user): void
    {
        $name = $_POST['user']['name'];
        $email = $_POST['user']['email'];
        $password = $_POST['user']['password'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $user = new User($name, $email, $hashedPassword);

        $dbObj = new Db();
        $connection = $dbObj->getConnection();

        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $statement = $connection->prepare($sql);

        $statement->execute([
            ':name' => $user->getName(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword(),
        ]);
    }

    public function getById(int $id)
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "SELECT * FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->execute([':id' => $id]);
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        return $statement->fetch();
    }

    public function update($user): void
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();

        $sql = "UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id";
        $hashedPassword = password_hash($user->password, PASSWORD_DEFAULT);

        $statement = $connection->prepare($sql);
        $statement->execute([
            ':name' => $user->name,
            ':email' => $user->email,
            ':password' => $hashedPassword,
            ':is_admin' => $user->is_admin,
            ':id' => $user->id
        ]);
    }

    public function updateProfile($id, $name, $email, $phone, $newPassword = null)
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();

        $password = $newPassword ? password_hash($newPassword, PASSWORD_DEFAULT) : $this->getCurrentPassword($id);

        $sql = "UPDATE users SET name = :name, email = :email, phone = :phone, password = :password WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':password' => $password,
            ':id' => $id
        ]);
    }

    private function getCurrentPassword($id)
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "SELECT password FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->execute([':id' => $id]);
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        return $result ? $result['password'] : '';
    }

    public function delete($user): void
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();

        $sql = "DELETE FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->execute([':id' => $user->id]);
    }

    public function register($user): void
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $statement = $connection->prepare($sql);
        $hashedPassword = password_hash($user->password, PASSWORD_DEFAULT);

        $statement->execute([
            ':name' => $user->name,
            ':email' => $user->email,
            ':password' => $hashedPassword
        ]);
    }

    public function login($email, $password)
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "SELECT * FROM users WHERE email = :email";
        $statement = $connection->prepare($sql);
        $statement->execute([':email' => $email]);
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $user = $statement->fetch();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }

    public function checkLogin($email, $password)
    {
        return $this->login($email, $password);
    }

    public function isAdmin($id)
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "SELECT is_admin FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->execute([':id' => $id]);
        $result = $statement->fetch(\PDO::FETCH_OBJ);
        return $result && $result->is_admin;
    }


    
     public function updateUser($id, $fullName, $companyName, $phone, $passwordHash)
    {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "UPDATE users SET full_name = ?, company_name = ?, phone = ?, password = ? WHERE id = ?";
        $statement = $connection->prepare($sql);
        
        return $statement->execute([ $fullName,$companyName,$phone, $passwordHash,$id]);
    }
}
?>