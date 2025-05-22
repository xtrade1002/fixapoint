<?php
namespace app\controller\dashboard;

require_once __DIR__ . '/../../model/dashboard/CategoryDao.php';

use app\model\dashboard\CategoryDao;

class CategoryController
{
    private $dao;

    public function __construct()
    {
        $this->dao = new CategoryDao();
    }

    public function addCategory(string $name): bool
    {
        return $this->dao->addCategory($name);
    }

    public function getAllCategories(): array
    {
        return $this->dao->getAllCategories();
    }
}
