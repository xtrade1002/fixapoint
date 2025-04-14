<?php
namespace app\model;

interface ICrudDao 
{
    public function getAll();
    public function save($data): void;
    public function getById(int $id);
    public function update($profile): void;
    public function delete($id): void;
}

?>