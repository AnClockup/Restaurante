<!DOCTYPE html>
<html>
<head>
    <title>Comendo!</title>
</head>
<body>

<h1>Bom Apetite!</h1>

<?php

// Recebe a comida do pedido
$comida = $_GET['comida'];
$comida = explode(",", $comida);

// Define os talheres necessários
$talheres_necessarios = array();
foreach ($comida as $item) {
    switch ($item) {
        case "Arroz":
        case "Feijão":
            $talheres_necessarios[] = "garfo";
            break;
        case "Carne":
        case "Salada":
            $talheres_necessarios[] = "garfo";
            $talheres_necessarios[] = "faca";
            break;
        case "Sopa":
            $talheres_necessarios[] = "colher";
            break;
    }
}

// Mostra o pedido e os talheres
echo "<p>Seu pedido: ";
foreach ($comida as $item) {
    echo "$item, ";
}
echo "</p>";

echo "<p>Você precisa de: ";
foreach ($talheres_necessarios as $talher) {
    echo "$talher, ";
}
echo "</p>";

?>

</body>
</html>