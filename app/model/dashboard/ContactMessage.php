<?php 
namespace app\model\dashboard;

class ContactMessage
{
    private int $id;
    private string $name;
    private string $email;
    private string $phone;
    private string $subject;
    private string $message;
    private string $submitted_at;

    public function __construct($name, $email, $phone, $subject, $message, $submitted_at)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->subject = $subject;
        $this->message = $message;
        $this->submitted_at = $submitted_at;
    }

    public function getId() { 
        return $this->id; 
    }

    public function getName() { 
        return $this->name; 
    
    }
    public function getEmail() { 
        return $this->email; 
    }

    public function getPhone() { 
        return $this->phone;
    }

    public function getSubject() { 
        return $this->subject; 
    }

    public function getMessage() { 
        return $this->message; 
    }

    public function getSubmittedAt() { 
        return $this->submitted_at; 
    }
}
