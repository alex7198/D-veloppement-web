<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/11/17
 * Time: 00:12
 */

class NewsGateway
{
    private $con;

    public function __construct(Connection $c)
    {
        $this->con = $c;
    }

    public function insert_news($titre, $description, $lien, $guid, $datepubli, $flux):string
    {
        $query = "INSERT INTO news VALUES (:titre,:description,:lien,:guid,:datepubli, :flux)";

        $paramaters = array(
            ':titre' => array($titre, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':lien' => array($lien, PDO::PARAM_STR),
            ':guid' => array($guid, PDO::PARAM_STR),
            ':datepubli' => array($datepubli, PDO::PARAM_STR),
            ':flux' => array($flux, PDO::PARAM_STR)
        );
        $this->con->executeQuery($query, $paramaters);
        return $this->con->lastInsertId();
    }

    public function check_news($guid):bool
    {
        $query = "SELECT COUNT(*) FROM news WHERE guid=:guid";

        $paramaters = array(
            ':guid' => array($guid, PDO::PARAM_STR)
        );
        $this->con->executeQuery($query, $paramaters);
        $res = $this->con->getResults();
        if ($res[0][0] == 0) {
            return true;
        }
        else {
            return false;
        }
    }


}