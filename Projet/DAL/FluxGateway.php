<?php

/**
 * Created by PhpStorm.
 * User: allabrosse1
 * Date: 22/11/17
 * Time: 17:10
 */
class FluxGateway
{

    public function __construct(Connection $c)
    {
        $this->con=$c;
    }

    public function insert_flux($flux):string
    {
        $query="INSERT INTO flux VALUES (:flux)";

        $paramaters=array(
            ':flux'=>array("$flux",PDO::PARAM_STR)
        );
        $this->con->executeQuery($query,$paramaters);
        return $this->con->lastInsertId();
    }

    public function suppr_flux($flux):string
    {
        $query="DELETE FROM flux  WHERE flux = :flux";

        $paramaters=array(
            ':flux'=>array($flux,PDO::PARAM_STR)
        );
        $this->con->executeQuery($query,$paramaters);
        return $this->con->lastInsertId();
    }
    public function select_flux():array
    {
        $query="SELECT * FROM flux";
        $this->con->executeQuery($query,$paramaters=[]);
        return $this->con->getResults();
    }
}