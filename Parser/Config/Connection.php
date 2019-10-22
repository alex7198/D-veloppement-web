<?php

/**
 * Created by PhpStorm.
 * User: allabrosse1
 * Date: 15/11/17
 * Time: 16:56
 */
class Connection extends PDO
{
    private $stmt;
    public function __construct($dsn, $username, $passwd)
    {
        parent::__construct($dsn, $username, $passwd);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery($query,$parameters):bool {

        $this->stmt=parent::prepare($query);
        foreach($parameters as $name => $value){
            $this->stmt->bindValue($name, $value[0], $value[1]);

        }
        return $this->stmt->execute();
    }

    public function getResults():array {
        return $this->stmt->fetchall();
    }

    


}

?>