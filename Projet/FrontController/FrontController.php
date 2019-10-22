<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 09/12/17
 * Time: 16:13
 */

class FrontController
{
    private  $Action_Admin = array('deconnection', 'consulterFlux', 'ajoutFlux','supprimerFlux', 'Connection', 'Parser','nbNews');
    private $Action_User = array(null);


    public function __construct()
    {
        global $vues;


        try {
            if(!isset($_REQUEST['action']))
            {$_REQUEST['action']=null;}
            $action = $_REQUEST['action'];//A NETTOYER


            if (in_array($action, $this->Action_Admin))

                if (!ModeleAdmin::isAdmin()) {

                    $_REQUEST['action'] = "Connection";
                    new ControleurAdmin();
                } else {

                    new ControleurAdmin();
                }

            else {
                if (in_array($action, $this->Action_User))
                    {
                        new ControleurUtilisateur();
                    }
                    else
                    {
                        $erreur[] = "Action inconnue";
                        $vues['erreur'];
                    }
                }
        }
        catch (Exception $e)
        {
            $tabErreur[]=$e->getMessage();
            $vues['erreur'];
        }
    }
}



