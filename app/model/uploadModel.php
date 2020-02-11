<?php 

class uploadModel extends CoreModel 
{

    public function upload(array $users) 
    {

        //forming db insertion        
        $stmt = $this->pdo->prepare("INSERT INTO userData (`name`,`age`, `email`, `phone`, `gender`, `uid`) 
                                        VALUES (:name, :age, :email, :phone, :gender, :uid)
                                    ON DUPLICATE KEY UPDATE
                                         name = :name, age = :age, email = :email, phone = :phone, gender = :gender, uid = :uid");
        foreach ($users as $user) 
        {
            $id = array_shift($user);
            $stmt->bindParam(':name', $user[0]);
            $stmt->bindParam(':age', $user[1]);
            $stmt->bindParam(':email', $user[2]);
            $stmt->bindParam(':phone', $user[3]);
            $stmt->bindParam(':gender', $user[4]);
            $stmt->bindParam(':uid', $id);

            if(!$stmt->execute()) 
            {
                return false;
            }

        }
        return true;
    }

}

?>