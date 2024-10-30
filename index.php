<!DOCTYPE html>
<html>
<head>
    <title>Restaurante Online</title>
</head>
<body>

<h1>Bem-vindo ao Restaurante!</h1>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <h2>Escolha seu pedido:</h2>

    <input type="checkbox" name="comida[]" value="Arroz"> Arroz
    <br>
    <input type="checkbox" name="comida[]" value="Feijão"> Feijão
    <br>
    <input type="checkbox" name="comida[]" value="Carne"> Carne
    <br>
    <input type="checkbox" name="comida[]" value="Salada"> Salada
    <br>
    <input type="checkbox" name="comida[]" value="Sopa"> Sopa
    <br>

    <h2>Talheres:</h2>
    <input type="radio" name="talheres" value="limpo"> Limpos
    <input type="radio" name="talheres" value="sujo"> Sujos

    <br><br>

    <input type="submit" name="pedido" value="Fazer Pedido">
</form>

<?php

if (isset($_POST['pedido'])) {

    $comida = $_POST['comida'];
    $talheres = $_POST['talheres'];

    // Verifica se foi escolhido algum item
    if (empty($comida)) {
        echo "<p>Por favor, escolha pelo menos um item do cardápio.</p>";
    } else {

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

        // Mostra o pedido
        echo "<p>Seu pedido: ";
        foreach ($comida as $item) {
            echo "$item, ";
        }
        echo "</p>";

        // Mostra os talheres necessários
        echo "<p>Você precisa de: ";
        foreach ($talheres_necessarios as $talher) {
            echo "$talher, ";
        }
        echo "</p>";

        // Verifica se os talheres estão sujos e exibe botão "Lavar"
        if ($talheres == 'sujo') {
            echo "<form method='get' action='comendo.php'>";
            echo "<input type='hidden' name='comida' value='".implode(",", $comida)."'>";
            echo "<input type='submit' name='lavar' value='Lavar talheres'>";
            echo "</form>";
        } else {
            // Se os talheres estão limpos, redireciona para comendo.php
            header('Location: comendo.php?comida='.implode(",", $comida));
        }
    }
}

?>

</body>
</html>