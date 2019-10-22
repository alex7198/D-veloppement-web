<?php

class Validation
{

    public static function validPseudo($pseudo):string
    {

        if ($p=filter_var($pseudo,FILTER_VALIDATE_REGEXP,
            array(
                "options" => array("regexp"=>"#^[a-zA-Z0-9]+[-]?[a-zA-Z0-9]*$#")
            ))) {
            return $p;

        } else {
            throw new Exception('Problème pseudo non correct');
        }
    }

    public static function validString($string):string
    {

        if ($s=filter_var($string,FILTER_VALIDATE_REGEXP,
            array(
                "options" => array("regexp"=>"#^[a-zA-Z]+$#")
            ))) {
            return $s;
        } else {
            throw new Exception('Problème de String');
        }
    }

    public static function validMdp($mdp):string
    {

        if ($m=filter_var($mdp,FILTER_VALIDATE_REGEXP,
            array(
                "options" => array("regexp"=>"#^[a-zA-Z0-9]+[-]?[a-zA-Z0-9]*$#")
            ))) {
            return $m;
        } else {
            throw new Exception('Problème mdp pas correct');
        }
    }

    public static function validTitre($titre):string
    {

        if ($rep=filter_var($titre, FILTER_VALIDATE_REGEXP,
            array(
                "options" => array("regexp" => "#^[a-zA-Z0-9]+$#")
            ))) {
            return $rep;

        } else {
            throw new Exception('titre incorrect');
        }
    }

    public static function validDescription($description):string
    {

        if ($rep=filter_var($description, FILTER_VALIDATE_REGEXP,
            array(
                "options" => array("regexp" => "#^[a-zA-Z0-9]{1,1000}$#")
            ))) {
            return $rep;

        } else {
            throw new Exception('description incorrect');
        }
    }

    public static function validLien($lien):string
    {

        if ($rep = filter_var($lien, FILTER_VALIDATE_URL)) {
            return $rep;
        } else {
            throw new Exception('lien invalide');
        }
    }

    public static function validGuid($guid):string
    {
        if ($rep = filter_var($guid,FILTER_VALIDATE_URL)) {
            return $rep;
        }

        else {
            throw new Exception('Ce guid n\'est pas valide');
        }
    }

    public static function validDate($datepubli):string
    {
        if ($rep = filter_var($datepubli, FILTER_VALIDATE_REGEXP,
            array(
                "options" => array("regexp" => "# \^([0-3][0-9]})(/)([0-9]{2,2})(/)([0-3]{2,2})$")
            ))) {
            return $rep;
        } else {
            throw new Exception('date invalide');
        }
    }

    public static function validCategorie($categorie):string
    {
        if ($rep = filter_var($categorie, FILTER_VALIDATE_REGEXP,
            array(
                "options" => array("regexp"=> "#^[a-zA-Z0-9]+$#")
            )))
        {
            return $rep;

        } else {
            throw new Exception('catégorie incorrecte');
        }
    }
    public static function validFlux($flux):string
    {
        if ($rep = filter_var($flux, FILTER_VALIDATE_REGEXP,
            array(
                "options" => array("regexp"=> "#^[a-zA-Z0-9-/_:.]*.xml$#")
            )))
        {
            return $rep;

        } else {
            throw new Exception('flux incorrect');
        }
    }


}
