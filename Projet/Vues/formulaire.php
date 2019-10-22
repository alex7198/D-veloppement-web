<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
        <link rel="stylesheet" media="screen" type="text/css" href="CSS/mycss.css" />
    </head>
    <body>
        <div class="noirhautform"></div>
        <h1 id="formulaire">Formulaire de connection</h1>
        </br>
        <main>
        <div id="form">
            <form action="index.php?action=Connection" method="post">
            <div class="row" >
                <label class="col-lg-2 col-lg-offset-4" for="pseudo">Votre pseudo :</label>
                <input class="col-lg-2" type="text" name="pseudo"/>
            </div>

            <div class="row">
                <label class="col-lg-2 col-lg-offset-4" for="mdp">Votre mot de passe :</label>
                <input  class="col-lg-2" type="password" name="mdp"/>
            </div>

            <div class="row" >
                <button id="boutonSeConnecter" type="submit" class="btn-info">Se connecter</button>
            </div>

            </form>


            <form action="index.php" method="post">
                <div class="row" >
                    <button id="boutonSeConnecter" type="submit" class="btn-info">Retour</button>
                </div>
            </form>
        </div>
            <div class="bleubas"></div>
        </main>
    <?php
        ?>

    </body>


</html>
