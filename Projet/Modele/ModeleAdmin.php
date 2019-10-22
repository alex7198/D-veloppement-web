<?php
/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 10/12/2017
 * Time: 14:17
 */

class ModeleAdmin
{
    function __construct()
    {
    }

    public function connection($pseudo, $mdp)
    {
        global $dsn, $user, $password;
        Validation::validPseudo($pseudo);
        Validation::validMdp($mdp);
        $n = new UtilisateurGateway(new Connection($dsn, $user, $password));

        if ($mdpfound = $n->recherche_utilisateur($pseudo)) {


            if (password_verify($mdp, $mdpfound[0][0])) {

                $_SESSION['role'] = 'admin';
                $_SESSION['login'] = $pseudo;

            } else {
                throw new Exception('Mot de passe incorrect');
            }
        }
        else{
            throw new Exception('Identifiant incorrect');
        }
    }

    public function deconnection()
    {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    public static function isAdmin()
    {
        if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
            $s = Validation::validPseudo(($_SESSION['login']));
            $r = Validation::validString($_SESSION['role']);
            return new Utilisateur($s, $r, ' ');
        } else {
            return null;
        }
    }


}

