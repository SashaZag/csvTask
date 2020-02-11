<?php

class truncateModel extends CoreModel 
{

    public function truncate() 
    {
        $stmt = $this->pdo->prepare("TRUNCATE TABLE userData");
        return $stmt->execute();
    }

}

?>