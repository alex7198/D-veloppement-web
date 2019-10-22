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
    public function select_flux():array
    {
        $query="SELECT * FROM flux";
        $this->con->executeQuery($query,$paramaters=[]);
        return $this->con->getResults();
    }
}