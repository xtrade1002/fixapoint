<?php
namespace app\model;

/**A User.php fájl általában egy osztályt tartalmaz, amely a felhasználói adatokat és a hozzájuk tartozó műveleteket definiálja. 
 * Ez az osztály a felhasználói adatokat modellezi, és általában getter és setter metódusokat tartalmaz az osztály tulajdonságainak eléréséhez és módosításához. */

class Service 
{

    private int $id;
    private string $nameOfService;
    private string $categoryOfService;
    private string $description;
    private int $duration;
    private int $price;

    
    public function __construct(int $id,string $nameOfService,string $categoryOfService,string $description,int $duration,int $price)
    {
        $this->id=$id;
        $this->nameOfService=$nameOfService;
        $this->categoryOfService=$categoryOfService;
        $this->description=$description;
        $this->duration=$duration;
        $this->price=$price;
    }


    
    public function getId()
    {
        return $this->id;
    }

    
    public function getName()
    {
        return $this->nameOfService;
    }

    
    public function setName($nameOfService)
    {
        $this->nameOfService = $nameOfService;

        return $this;
    }

    public function getCategoryOfService()
    {
         return $this->categoryOfService;
    }

      
    public function setCategoryOfService($categoryOfService)
    {
        $this->categoryOfService = $categoryOfService;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    
    public function getDuration()
    {
        return $this->duration;
    }

    
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    
        
}