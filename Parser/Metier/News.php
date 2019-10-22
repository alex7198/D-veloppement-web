<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/11/17
 * Time: 00:11
 */

class News
{

    private $titre;
    private $description;
    private $lien;
    private $guid;
    private $datepubli;


    function __construct(){
        $cpt = func_num_args();
        $args = func_get_args();

        switch ($cpt){
            case 0:
                $this->null();
                break;
            case 2:
                $this->full($args[0],$args[1],args[2],args[3],$args[4]);
                break;

            default:
                echo 'Pas le bon nb d\'arguments</br>';
        }

    }

    public function full($titre,$description,$lien,$guid,$datepubli)
    {
        $this->titre=$titre;
        $this->description=$description;
        $this->lien=$lien;
        $this->guid=$guid;
        $this->datepubli=$datepubli;
    }

    public function null()
    {
        $this->titre=null;
        $this->description=null;
        $this->lien=null;
        $this->guid=null;
        $this->datepubli=null;
    }
}