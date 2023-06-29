<?php

use Acme\classes\Bestelling;

require "../vendor/autoload.php";
$productIds = $_POST['products'];
$idTafel = $_POST['idtafel'];

// TODO: De bestelling doorvoeren in de database (maak gebruik van de Bestelling class)
$Bestelling = new Bestelling($idTafel, $productIds);
$Bestelling->addProducts($productIds);
foreach ($productIds as $product) {
    $index = 2;
    while (isset($_POST['product' . $index])) {
        if ($_POST['product' . $index] !== '') {
            for ($number = 0; $number < $_POST['product' . $index]; $number++) {
                $Bestelling->saveBestelling();
            }
        }
        $index++;
    }
}

header("Location: index.php");
