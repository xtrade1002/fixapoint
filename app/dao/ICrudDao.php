<?php
namespace app\dao;

interface ICrudDao 
{
    public function getAll();
    public function save($object): void;
    public function getById(int $id);
    public function update($object): void;
    public function delete($object): void;
}

?>