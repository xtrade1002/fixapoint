<?php
namespace app\model;

class Admin{

    private $id;
    private $email;
    private $password;

    public function __construct($id,$email,$password)
    {
        $this->id=$id;
        $this->email=$email;
        $this->password=$password;     
    }

    

    public function getId()
    {
        return $this->id;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }
}


?>