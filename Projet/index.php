<?php
    require_once('Config/Autoload.php');
    Autoload::charger();
    require_once('Config/config.php');

    session_start();
    $cont=new FrontController();

?>