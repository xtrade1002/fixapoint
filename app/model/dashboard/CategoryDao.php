<?php
namespace app\model\dashboard;

require_once __DIR__ . '/../../_utils/Database.php';
use app\_utils\Database;
use PDOException;

class CategoryDao
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addCategory(string $name): bool
    {
        $connection = $this->db->getConnection();
        $sql = "INSERT INTO categories (name) VALUES (?)";

        try {
            $statement = $connection->prepare($sql);
            return $statement->execute([$name]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getAllCategories(): array
    {
        $connection = $this->db->getConnection();
        $sql = "SELECT * FROM categories";

        try {
            $statement = $connection->query($sql);
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}
