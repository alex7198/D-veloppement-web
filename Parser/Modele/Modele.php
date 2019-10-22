<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 29/11/17
 * Time: 12:13
 */

class Modele
{
    function __construct()
    {

    }

    public function addNews($titre, $description, $lien, $guid, $datepubli, $flux):string
    {
        global $dsn, $user, $password;
        $n = new NewsGateway(new Connection($dsn, $user, $password));
        return $n->insert_news($titre, $description, $lien, $guid, $datepubli, $flux);
    }


    public function getAllFlux():array
    {
        global $dsn, $user, $password;
        $f = new FluxGateway(new Connection($dsn, $user, $password));
        return $f->select_flux();
    }


    public function checkNews($guid):bool
    {
        global $dsn, $user, $password;
        $n = new NewsGateway(new Connection($dsn, $user, $password));
        return $n->check_news($guid);
    }

}

