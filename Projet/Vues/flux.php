<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" media="screen" type="text/css" href="CSS/mycss.css"/>
</head>
<body>
<main>
    <div class="noirhautform"></div>
    <h1 id="titre">Flux</h1>
    </br>

    <form action="index.php?action=nbNews" method="post">

        <div class="row">

            <label class="col-lg-3 col-lg-offset-4">Définir le nombre de page par News : </label>
            <input class="col-lg-2" name="nb" type="text"/>
        </div>
        <div class="button" id="titre">
            <button class="btn-info"> Valider</button>
        </div>
    </form>
    <?php
    if (isset($erreur['cookie'])) {
        ?>
        <div class="erreur">
            <label> <?php echo $erreur['cookie']; ?></label>
        </div>
        <?php
    }
    ?>
    </br>
    </br>
    <div id="form">
        <?php
        foreach ($tabFlux as $row) {
            $flux = $row[0];
            echo "
            <form id='news' action='index.php?action=supprimerFlux&suppr=$flux' method='post'>
                <div class='bleu'>
                    <div id='titre'>
                        <label>Flux :</label>
                        <a href='$flux'>$flux</a>
                        <button type='submit' class='btn-info'>Supprimer</button>
                    </div>
                    <div class='noir'></div>
                </div>
             </form>
        ";
        }


        if (!isset($_REQUEST['ajout'])) {
            ?>
            <form action="index.php?action=consulterFlux&ajout=true" method="post">
                <div id="titre">
                    <button type="submit" class="btn-info">Ajouter</button>
                </div>
            </form>
            <?php
        }
        if (isset($_REQUEST['ajout'])) {
            ?>
            <form action="index.php?action=ajoutFlux" method="post">
                <div id="titre">
                    <title>Flux :</title>
                    <input type="text" name="flux"/>
                </div>
                <div id="titre">
                    <button type="submit" class="btn-info">Ajouter</button>
                </div>
            </form>
            <?php
        }
        if (isset($erreur['pbflux'])) {
            ?>
            <div class="erreur">
                <label> <?php echo $erreur['pbflux']; ?></label>
            </div>
            <?php
        }
        ?>
        <form action="index.php" method="post">
            <div id="titre">
                <button class="btn-info"> Retour</button>
            </div>
        </form>
        <div class="bleuBas"></div>
    </div>
</main>

</body>

</html>