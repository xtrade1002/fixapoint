<?php
namespace app\controller;

require_once(__DIR__ . '/../../../model/dashboard/ContactMessageDao.php');

use app\model\dashboard\ContactMessageDao;

class ContactMessageController
{
    public function load($view, $data = [])
    {
        extract($data);
        ob_start();
        require_once("app/view/auth/dashboard/contact/{$view}.php");
        return $data;
    }

    public function listMessages()
    {
        $dao = new ContactMessageDao();
        $messages = $dao->getAll();

        return $this->load('list', [
            'messages' => $messages
        ]);
    }

    public function viewMessage($id)
    {
        $dao = new ContactMessageDao();
        $message = $dao->getById($id);

        return $this->load('view', [
            'message' => $message
        ]);
    }
}
