<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 29/11/17
 * Time: 11:24
 */

class ControleurAdmin extends ControleurUtilisateur
{
    function __construct()
    {


        global $vues;
        try {
            if (!isset($_REQUEST['action'])) {
                $_REQUEST['action'] = NULL;

            }
            $action = $_REQUEST['action'];
            switch ($action) {

                case('Connection'):
                    $this->connection();

                    break;

                case('consulterFlux'):
                    $this->consulterFlux(null);
                    break;

                case('ajoutFlux'):
                    $this->ajoutFlux();
                    break;

                case('deconnection'):
                    $this->deconnection();
                    break;
                case('supprimerFlux'):
                    $this->supprimerFlux();
                    break;

                case ('nbNews'):
                    $this->ajoutnbNews();
                    break;

            }
        } catch (PDOException $e) {
            $erreur[] = "Erreur Connection</br>";
            $erreur[] = $e->getMessage() . "</br>";
            $erreur[] = $e;
            require($vues['erreur']);
        } catch (Exception $e) {
            $erreur[] = "Erreur inattendue</br>";
            $erreur[] = $e->getMessage() . "</br>";
            $erreur[] = $e;
            require($vues['erreur']);
        }
    }


    function connection()
    {
        global $vues;
        $m = new ModeleAdmin();

        try {
            if (isset ($_POST['pseudo']) && isset ($_POST['mdp'])) {

                $pseudo = $_POST['pseudo'];
                $mdp = $_POST['mdp'];

                //$mdpC=password_hash($mdp,PASSWORD_DEFAULT);
                $m->connection($pseudo, $mdp);
                $this->consulter();
            } else {

                require($vues['formulaire']);
            }


        } catch (Exception $e) {
            $erreur['connect'] = $e->getMessage();
            require($vues['formulaire']);
        }
    }

    function deconnection()
    {
        global $vues;
        $m = new ModeleAdmin();
        //var_dump($_GET);
        $m->deconnection();
        $this->consulter();
        //echo ' vous avez été déconnecté.';

    }

    function consulterFlux($mesErreur)
    {
        global $vues;
        $m = new Modele();
        $tabFlux = $m->getAllFlux();
        if(isset($mesErreur)){
            $erreur['pbflux']=$mesErreur;
        }
        require($vues['flux']);

    }

    function ajoutFlux()
    {
        global $vues;
        $m = new Modele();
        try {
            if (isset($_POST['flux'])) {
                $flux = $_POST['flux'];
                Validation::validFlux($flux);
                $m->addFlux($flux);
            } else {
                require($vues['flux']);
            }
            $this->consulterFlux(null);
        } catch (Exception $e) {
            $this->consulterFlux($e->getMessage());
        }

    }

    function supprimerFlux()
    {
        global $vues;
        $m = new Modele();
        if (isset($_REQUEST['suppr'])) {
            $flux = $_REQUEST['suppr'];
            Validation::validFlux($flux);
            $m->supprFlux($flux);
            $this->consulterFlux(null);

            if ($m->checkNewsByFlux($flux)) {
                $m->supprNews($flux);
                $this->consulterFlux(null);
            }
        }
    }

    function ajoutnbNews()
    {
        $mc=new ModeleCookie();
        try{
            if(isset($_POST['nb']))
            {
                $nb_News=$_POST['nb'];

                $mc->modifNbCookie($nb_News);
                $this->consulterFlux(null);
            }

        }
        catch (Exception $e)
        {
            $this->consulterFlux($e->getMessage());
        }
    }

}

