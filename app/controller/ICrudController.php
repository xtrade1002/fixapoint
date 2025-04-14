<?php
namespace app\controller;

interface ICrudController {
    public function load($view, $data = []);
    public function listAll();
    public function save();
    public function loadObjToEdit(int $id);
    public function loadObjToDelete(int $id);
    public function updateById(int $id);
    public function deleteById(int $id);
}