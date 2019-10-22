<?php

/**
 * Created by PhpStorm.
 * User: allabrosse1
 * Date: 22/11/17
 * Time: 16:22
 */
class UtilisateurGateway
{

    public function __construct(Connection $c)
    {
        $this->con=$c;
    }

    public function insert_utilisateur($pseudo,$mdp):string
    {
        $query="INSERT INTO utilisateur VALUES (:pseudo,:mdp)";

        $paramaters=array(
            ':pseudo'=>array($pseudo,PDO::PARAM_STR),
            ':mdp'=>array("$mdp",PDO::PARAM_STR)
        );
        $this->con->executeQuery($query,$paramaters);
        return $this->con->lastInsertId();
    }

    public function count_user($pseudo):array
    {
        $query="SELECT COUNT(*) FROM utilisateur WHERE pseudo=:pseudo";

        $paramaters=array(
            ':pseudo'=>array($pseudo,PDO::PARAM_STR),

        );
        $this->con->executeQuery($query,$paramaters);
        return $this->con->getResults();
    }



    public function delete_utilisateur($pseudo):string
    {
        $query="DELETE FROM utilisateur WHERE pseudo = :pseudo";

        $paramaters=array(
            ':pseudo'=>array($pseudo,PDO::PARAM_STR)
        );
        $this->con->executeQuery($query,$paramaters);
        return $this->con->lastInsertId();
    }

    public function recherche_utilisateur($pseudo):array
    {
        $query="SELECT mdp FROM utilisateur WHERE pseudo=:pseudo";
        $paramaters=array(
            ':pseudo'=>array($pseudo,PDO::PARAM_STR),
        );
        $this->con->executeQuery($query,$paramaters);
        return $this->con->getResults();

    }

}