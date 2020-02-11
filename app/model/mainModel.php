<?php

class mainModel extends CoreModel 
{

    public function getData() 
    {
        //return all records from db
        $stmt = $this->pdo->prepare("SELECT * FROM userData");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}

?>