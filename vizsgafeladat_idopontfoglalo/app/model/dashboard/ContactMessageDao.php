<?php

namespace app\model\dashboard;

use app\model\ICrudDao;
use app\_utils\Database as Db;

require_once __DIR__ . '/../../_utils/Database.php';
require_once __DIR__ . '/../ICrudDao.php';
require_once __DIR__ . '/Message.php';

class ContactMessageDao
{
    public function getAll()
    {
        $db = new Db();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM messages ORDER BY submitted_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getById($id)
    {
        $db = new Db();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM messages WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }
}