<html>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<link rel="stylesheet" media="screen" type="text/css" href="CSS/mycss.css" />
    <body>


    <h1>Erreur</h1>

    <?php
    foreach ($erreur as $value){
        echo ($value);
        echo("</br>");
    }
    ?>

    </body>
</html>
