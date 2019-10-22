<html>
<body>
<?php

include ('Parser.php');
$m = new Modele();
$tabFlux = $m->getAllFlux();
foreach ($tabFlux as $flux){

    $adresse=$flux[0];
    $parser = new Parser($flux[0],$flux[0]);
    $parser ->parse();

}

?>
</body>
</html>
