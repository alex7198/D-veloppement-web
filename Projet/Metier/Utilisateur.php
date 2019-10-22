<?php

/**
 * Created by PhpStorm.
 * User: allabrosse1
 * Date: 08/11/17
 * Time: 16:41
 */
class Utilisateur
{
    private $id;
    private $mdp;



    function __construct(){
        $cpt = func_num_args();
        $args = func_get_args();

        switch ($cpt){
            case 2:
                $this->deux_arguments($args[0],$args[1]);
                break;
            case 3:
                $this->trois_arguments($args[0],$args[1],$args[2]);
                break;
            default:
                echo 'pas le bon nb d\'arguments mdr';
        }

    }

    public function deux_arguments($id,$mdp){
        $this->id=$id;
        $this->mdp=$mdp;
    }

    public function trois_arguments($id,$role,$autre){
        $this->id=$id;
        $this->mdp=$role;
    }
}

?>
