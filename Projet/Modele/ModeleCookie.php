<?php
/**
 * Created by PhpStorm.
 * User: Alex!
 * Date: 20/12/2017
 * Time: 11:47
 */

class ModeleCookie
{
    public function modifNbCookie($nbNews)
    {
        if ($nbNewsN = $this->getUserNbNews($nbNews)) {
            setcookie("nbNews", $nbNewsN, time() + 365 * 24 * 3600);
        }
    }

    public function creerCookieDeBase():int
    {
        setcookie("nbNews", 10, time() + 365 * 24 * 3600);
        return (int)$_COOKIE["nbNews"];
    }


    public function getUserNbNews($nbNews)
    {
        try {

            if ($nbNewsN = Validation::validInt($nbNews)) {
                return $nbNewsN;
            }
        } catch (Exception $e) {
            throw new Exception("Valeur incorrecte");
        }
    }
}