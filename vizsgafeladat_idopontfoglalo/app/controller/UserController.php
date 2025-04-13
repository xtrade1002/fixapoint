<?php
namespace app\controller;

use app\model\UserDao;
use app\model\User;



class UserController {
    private $userDao;

    public function __construct() {
        $this->userDao = new UserDao();
    }

    public function getAllUsers() {
        return $this->userDao->getAll();
    }

    public function registerUser($name, $email, $password) {
        $user = new User(null); 
        $user->fullName = $name;
        $user->email = $email;
        $user->password = $password;
    
        return $this->userDao->register($user);
    }
    

    public function loginUser($email, $password) {
        return $this->userDao->login($email, $password);
    }

    public function getUserById($id) {
        return $this->userDao->getById($id);
    }

    public function checkIfAdmin($id) {
        return $this->userDao->isAdmin($id);
    }

    public function update($id, $name, $email, $password) {
        $user = new User(null);
        $user->id = $id;
        $user->fullName = $name;
        $user->email = $email;
        $user->password = $password;
        $this->userDao->update($id, $name, $email, $password);
    }
    

    public function delete($id) {
        $this->userDao->delete($id);
    }
    

    public function checkUserLogin($email, $password) {
        return $this->userDao->checkLogin($email, $password);
    }
}
?>