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

    public function insertUser($nom,$mdp)
    {
        global $dsn, $user, $password;
        $n=new UtilisateurGateway(new Connection($dsn, $user, $password));

        $n->insert_utilisateur($nom,$mdp);
    }

    public function countUser($pseudo):array
    {
        global $dsn, $user, $password;
        $n=new UtilisateurGateway(new Connection($dsn, $user, $password));
        return $n->count_user($pseudo);
    }

    public function getNbNews():array
    {
        global $dsn, $user, $password;
        $n = new NewsGateway(new Connection($dsn, $user, $password));
        return $n->count_news();
    }

    public function getPageNews($premiereNews, $derniereNews):array
    {
        global $dsn, $user, $password;
        $n = new NewsGateway(new Connection($dsn, $user, $password));
        return $n->page_news($premiereNews, $derniereNews);
    }

    public function addNews($titre, $description, $lien, $guid, $datepubli, $flux):string
    {
        global $dsn, $user, $password;
        $n = new NewsGateway(new Connection($dsn, $user, $password));
        return $n->insert_news($titre, $description, $lien, $guid, $datepubli, $flux);
    }

    public function supprNews($flux):string
    {
        global $dsn, $user, $password;
        $n = new NewsGateway(new Connection($dsn, $user, $password));
        return $n->suppr_news($flux);
    }

    public function getAllFlux():array
    {
        global $dsn, $user, $password;
        $f = new FluxGateway(new Connection($dsn, $user, $password));
        return $f->select_flux();
    }

    public function addFlux($flux):string
    {
        global $dsn, $user, $password;
        $f = new FluxGateway(new Connection($dsn, $user, $password));
        return $f->insert_flux($flux);
    }

    public function checkNewsByFlux($flux):bool
    {
        global $dsn, $user, $password;
        $n = new NewsGateway(new Connection($dsn, $user, $password));
        return $n->check_news_by_flux($flux);
    }

    public function supprFlux($flux):string
    {
        global $dsn, $user, $password;
        $f = new FluxGateway(new Connection($dsn, $user, $password));
        return $f->suppr_flux($flux);
    }
}

