<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
        <link rel="stylesheet" media="screen" type="text/css" href="CSS/mycss.css" />
    </head>
    <body>


        <div class="noirhaut">
            <?php

        if(!ModeleAdmin::isAdmin()){
        echo'
        <form action="index.php?action=Connection" method="post">
            <div class="pull-right" id="connexion">
                <button type="submit" class="btn-info">Connection</button>
            </div>
        </form>';
        }

            if(ModeleAdmin::isAdmin()){
                echo'
      
        <form action="index.php?action=consulterFlux" method="post">
            <div class>
                <button class="btn-info" type="submit">Flux</button>
            </div>
        </form>
        <form action="index.php?action=deconnection" method="post">
            <div>
                <button class="btn-info"  type="submit">Déconnexion</button>
            </div>
        </form>
        
        ';
            }

        ?>
        </div>

            <div id="form">
        <h1 id="titre">Bienvenue sur SportNews</h1>
        <?php
        if(isset($tabNews)) {
            foreach ($tabNews as $row) {
                $date = $row[4];
                $titre = $row[0];
                $desc = $row[1];
                $lien = $row[2];
                echo "
            <div class='bleu' >
                <div>
                    <label>Date de publication :</label>
                    <label>$date</label>
                </div>
                <div>
                    <label>Titre :</label>
                    <label>$titre</label>
                </div>
                <div>
                    <label>Description :</label>
                    <label>$desc</label>
                </div>
                <div>
                    <label>Lien :</label>
                    <a href='$lien'>$lien</a>
                </div>
             </div>
             <div class='noir'>
             </div >
        ";
            }
        }
        if ($nb_page > 1) {

            echo "<div class='page'>";
            if ($page > 1) {
                echo ' <a href="?page=' . ($page - 1) . '">' . "<" . '</a> ';
            }
            $i=1;
            while ($i <= $nb_page){
                echo '<a href="?page=' . $i . '">' . " $i " .'</a>';
                $i++;
            }

            if ($page < $nb_page) {
                echo ' <a href="?page=' . ($page + 1) . '">' . ">" . '</a> ';
            }

            echo "<div>";
        }
        ?>


            </div>
        <div class="noirhaut"></div>
    </body>
</html>
