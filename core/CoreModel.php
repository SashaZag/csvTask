<?php 

class coreModel 
{

    protected $pdo;

    public function __construct() 
    { 
        $this->pdo = new PDO ('mysql:host=localhost;dbname=csvTask', 'newuser', 'password');
    }

}