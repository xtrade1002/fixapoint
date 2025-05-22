<?php
namespace app\model\dashboard;

class Category
{
    public int $id;
    public string $name;

    public function __construct(?int $id = null, string $name = '')
    {
        $this->id = $id ?? 0;
        $this->name = $name;
    }
}
