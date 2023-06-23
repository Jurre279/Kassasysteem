<?php

namespace Acme;

use Acme\model\ProductModel;

require "../vendor/autoload.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="bestellingdoorvoeren.php" method="post">
        <?php
        $product = new ProductModel();

        // QUESTION: Wat doet ?? in de code-regel hier onder?
        // Antwoord:
        $idTafel = $_GET['idtafel'] ?? false;
        if ($idTafel) {
            echo "<input type='hidden' name='idtafel' value='$idTafel'>";
            $productmodel = new ProductModel();
            $products = $productmodel->getProducts();
            // TODO: alle producten ophalen uit de database en als inputs laten zien (maak gebruik van ProductModel class)
            // Zoiets als dit:
            foreach ($products as $item) {
                echo "<div>";
                echo "<label><input type='checkbox' name='products[]' value='{$item->getColumnValue('idproduct')}'>{$item->getColumnValue('naam')}</label";
                echo "<label>Aantal:<input type='number' name='product{$item->getColumnValue('idproduct')}'></label>";
                echo "</div>";
            }
            echo "<button>Volgende</button>";
        } else {
            // QUESTION: Wat gebeurt hier?
            // Antwoord:
            http_response_code(404);
            include('error_404.php');
            die();
        }
        ?>

    </form>
</body>

</html>