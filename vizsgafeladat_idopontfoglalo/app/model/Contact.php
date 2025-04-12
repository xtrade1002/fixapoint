<?php
namespace app\model;


class Contact
{
    private $pdo;
    private $name;
    private $email;
    private $subject;
    private $message;
    private $submitted_at;

    public function __construct( $pdo, $name = null, $email = null, $subject = null, $message = null)
{
    $this->pdo = $pdo;
    $this->name = $name;
    $this->email = $email;
    $this->subject = $subject;
    $this->message = $message;
}

    public function __destruct()
    {
        
    }

   
    public function getName()
    {
        return $this->name;
    }

    
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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

    
    public function getMessage()
    {
        return $this->message;
    }

    
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function getSubmitted_at()
    {
        return $this->submitted_at;
    }

   
    public function setSubmitted_at($submitted_at)
    {
        $this->submitted_at = $submitted_at;

        return $this;
    }

    

    public function save($name, $email, $message)
    {
        $stmt = $this->pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':message' => $message
        ]);
    }

}
