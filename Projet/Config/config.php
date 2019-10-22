<?php

$rep=__DIR__.'/../';

//Ordi Baptiste
/*$dsn='mysql:host=localhost;dbname=projetphp';
$user='root';
$password='root';*/

//Ordi IUT
/*$dsn='mysql:host=localhost;dbname=dballabrosse1';
$user='allabrosse1';
$password='allabrosse1';*/

//Ordi Alex
$dsn='mysql:host=localhost;dbname=projetphp';
$user='root';
$password='root';

//include_once ("Parser/timer.php");

$vues['erreur']='Vues/erreur.php';
$vues['formulaire']='Vues/formulaire.php';
$vues['acceuil']='Vues/accueil.php';
$vues['flux']='Vues/flux.php';
$vues['appel']='Parser/appel.php';


//Pour insérer l'admin root en base
/*$pseudo='root';
$mdp='root';
$m=new Modele();
if($m->countUser($pseudo)[0][0]==0) {
    $mdpC = password_hash($mdp,PASSWORD_DEFAULT);
    $m->insertUser($pseudo, $mdpC);
}
else{
    //NE RIEN FAIRE
}
*/




?>