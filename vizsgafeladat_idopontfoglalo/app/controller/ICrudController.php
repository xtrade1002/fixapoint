<?php
namespace app\controller;

interface IController
{
    public function listAll();
    public function save();
    public function loadObjToEdit(int $id);
    public function updateById();
    public function deleteById();
    public function loadObjToDelete(int $id);
    public function load($view, $data = []);
}
?>