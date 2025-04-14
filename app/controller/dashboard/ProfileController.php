<?php
namespace app\controller;

require_once('app/model/UserDao.php');

use app\model\UserDao;

class ProfileController
{
    public function load($view, $data = [])
    {
        extract($data);
        ob_start();
        require_once("app/view/auth/dashboard/profile/{$view}.php");
        return $data;
    }

    public function viewProfile($id)
    {
        $userDao = new UserDao();
        $user = $userDao->getById($id);

        return $this->load('view', [
            'user' => $user
        ]);
    }

    public function editProfile($id)
    {
        $userDao = new UserDao();
        $user = $userDao->getById($id);

        return $this->load('edit', [
            'user' => $user
        ]);
    }

    public function updateProfile($id) 
    {
        $userDao = new UserDao();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            $name = $_POST['fullName'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $company = $_POST['companyName'] ?? '';
            $password = $_POST['password'] ?? '';

            $hashedPassword = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;
            $success = $userDao->updateProfile($id, $name, $email, $phone, $company, $hashedPassword);

              if ($success) {
                header('Location: profile.php?status=success');
            } else {
                header('Location: profile.php?status=error');
            }
            exit;
        }
        
        header('Location: profile.php?status=invalid');
        exit;
    }
}
