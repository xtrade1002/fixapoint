<?php
namespace app\controller\dashboard;

use app\dao\UserDao;

class ProfileController
{
    private $userDao;

    public function __construct()
    {
        $this->userDao = new UserDao();
    }

    public function updateProfile($id, $fullName, $companyName, $phone, $password = null)
    {
       
        $passwordHash = $password ? password_hash($password, PASSWORD_DEFAULT) : null;

       
        return $this->userDao->updateUser($id, $fullName, $companyName, $phone, $passwordHash);
    }

 
    public function deleteProfile($id)
    {
        
        return $this->userDao->deleteUser($id);
    }

    
}
