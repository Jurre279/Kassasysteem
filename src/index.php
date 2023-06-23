<?php

// In composer.json wordt acme-namespace aan src-folder gekoppeld
// Elk php-bestand moet een namespace hebben, geredeneerd vanuit de src-map (acne-namespace)
namespace Acme;

use Acme\model\TafelModel;

require_once "../vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <pre>
<?php

$tafel = new TafelModel();
$alles = $tafel->getAll();
foreach ($alles as $yep) {
    echo "<div><a href='keuze.php?idtafel={$yep->getColumnValue("idtafel")}'>{$yep->getColumnValue("omschrijving")}</div>";
}
?>
</body>
</html>