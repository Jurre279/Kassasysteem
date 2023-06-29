<?php

namespace Acme;

use Acme\classes\Rekening;

require "../vendor/autoload.php";
$idTafel = $_GET['idtafel'] ?? null;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($idTafel) {
?>

    <link rel="stylesheet" href="style.css">

    <?php
    //TODO: bestelling ophalen en tonen op een mooie manier door gebruik te maken van Rekening.php
    $rekening = new Rekening($idTafel);
    $eindrekening = $rekening->getBill($idTafel);
    $total = 0;
    ?>

    <h1>Rekening</h1>
    <?php
    foreach ($eindrekening["products"] as $product) {
        $totalPrice = $product["data"]["prijs"] * $product["aantal"];
        //TODO: 'totaal' toevoegen aan de rekening
        $total += $totalPrice;
        echo '<div class="eindrekening-product">';
        echo '<p>' . $product["data"]["naam"] . '</p>';
        echo '<p>x ' . $product["aantal"] . '</p>';
        echo '<p class="eindrekening-amount">&euro;' . $totalPrice . '</p>';
        echo '</div>';
    }

    echo '<h3 id="total">Subtotaal: &euro;' . $total . '</h3>';
    ?>
    </div>

<?php
    // $rekening->setPaid($idTafel);

} else {
    http_response_code(404);
    include('error_404.php');
    die();
}
