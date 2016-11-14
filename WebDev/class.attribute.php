<?php

class Attribute{

    private $connection;
    private $attribute_id;

    public function __construct($connection)
    {
       $this->connection = $connection;
    }
    public function createAttribute($name)
    {
        try{
            $stmt = $this->connection
                ->prepare("insert into attributes(attribute_name) values(:name)");
            $stmt->bindParam(":name", $name);
            $stmt->execute();
            return $stmt;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function addAttributeToUser($value, $attribute_id,$user_id)
    {
        try{
            $stmt = $this->connection
                ->prepare("insert into user_attribute(value,attribute_id,user_id) values(:attr,:attribute_id,:user_id)
                  on DUPLICATE key update value= :attr");
            $stmt->bindParam(":attr", $value);
            $stmt->bindParam(":attribute_id", $attribute_id);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->execute();
            return $stmt;

        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function validate_name($name)
    {
        try{
            $stmt = $this->connection
                ->prepare("select * from attributes where attribute_name = :name");
            $stmt->execute([':name'=>$name]);
            $attribute = $stmt->fetch(PDO::FETCH_ASSOC);
            return ($attribute['attribute_name'] == $name) ? false : true;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function validate_attribute($name)
    {
        try{
            $stmt = $this->connection
                ->prepare("select * from attributes where attribute_name = :name");
            $stmt->execute([':name'=>$name]);
            $attribute = $stmt->fetch(PDO::FETCH_ASSOC);
            return ($attribute['attribute_name'] == $name) ? false : true;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getAttributes(){
        $stmt = $this->connection
            ->prepare("select * from attributes");
        $stmt->execute();
        $attributes = $stmt->fetchAll();
        return $attributes;
}

}
