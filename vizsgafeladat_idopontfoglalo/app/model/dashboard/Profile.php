<?php 
namespace app\model\dashboard;


class Profile
{
    private int $id;
    private string $fullName;
    private string $companyName;
    private string $email;
    private int $phone;
    private string $password;

    public function __construct(string $fullName, string $companyName, string $email, int $phone, string $password){
        $this->fullName = $fullName;
        $this->companyName = $companyName;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
    }


    public function getFullName()
    {
        return $this->fullName;
    }

    
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

   
    public function getCompanyName()
    {
        return $this->companyName;
    }

    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

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

  
    public function getPhone()
    {
        return $this->phone;
    }

  
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

   
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    
    public function getPassword()
    {
        return $this->password;
    }

    public function debugObjData()
     {
        echo "<pre>";
        var_dump($this);
        echo "</pre>";
    }
}
