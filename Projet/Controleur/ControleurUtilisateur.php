<?php

class ControleurUtilisateur
{
    function __construct()
    {


        global $vues;
        try {

            $action = $_REQUEST['action'];
            switch ($action) {
                case NULL:
                    $this->consulter();
                    break;
            }
        } catch (PDOException $e) {
            $erreur[] = "Erreur Connection";
            $erreur[] = $e->getMessage();
            require($vues['erreur']);
        } catch (Exception $e) {
            $erreur[] = "Erreur inattendue";
            $erreur[] = $e->getMessage();
            require($vues['erreur']);
        }
    }

    function consulter()
    {
        try {
            global $vues;
            $m = new Modele();
            $mc=new ModeleCookie();
            if(isset($_COOKIE['nbNews']))
            {
                $nb_news_par_page = (int)$_COOKIE['nbNews'];
            }
            else{
                $nb_news_par_page = $mc->creerCookieDeBase();
            }


            $total = $m->getNbNews();
            $nb_page = ceil($total[0][0] / $nb_news_par_page);
            if (isset($_GET['page'])) {
                $page = intval($_GET['page']);

                if ($page > $nb_page) {
                    $page = $nb_page;
                }
            } else {
                $page = 1;
            }
            $premiereNews = ($page - 1) * $nb_news_par_page;
            $derniereNews = $nb_news_par_page;
            //$tabNews = $m->getAllNews();
            $tabNews = $m->getPageNews($premiereNews, $derniereNews);
            //echo "</br>Total: " . $total[0][0] . "</br>Nb Page:" . $nb_page . "</br>Page: " . $page .  "</br>1:" . $premiereNews . "</br>2:" . $derniereNews;
            require($vues['acceuil']);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }





}