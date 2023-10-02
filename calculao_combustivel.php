<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Calculadora de combustível</title>
    <style>
        fieldset {
            border: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        #container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        label {
            display: block;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .campo {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid
        }

        .bt {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        h4 {
            margin-top: 10px;
            color: #333;
        }
    </style>
</head>

<body>
    <div id="container">
        <fieldset>
            <form method="POST">
                <label> Insira o valor da gasolina</label>
                <input type="text" name="gasolina" id="gasolina" class="campo" placeholder="Preço por litro">
                <br>
                <label>Insira o valor do etanol</label>
                <input type="text" name="etanol" id="etanol" class="campo" placeholder="Preço por litro"> <br>
                <input type="submit" name="btenviar" class="bt" value="Calcular">
            </form>
        </fieldset>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["gasolina"]) && isset($_POST["etanol"])) {
                $_gasolina = $_POST["gasolina"];
                $_etanol = $_POST["etanol"];

                $_gasolina = str_replace(",", ".", $_gasolina); //Substitiu a virgua por um ponto.
                $_gasolina = (float) $_gasolina; //Converte o valor da variável de string para float.
                $_etanol = str_replace(",", ".", $_etanol); //Substitiu a virgua por um ponto.
                $_etanol = (float) $_etanol; //Converte o valor da variável de string para float.
        
                ?>

                <h4>

                    <?php

                    if (empty($_gasolina) and (empty($_etanol))) {
                        echo "Por favor, insira os valores corretamente.";
                    } else {
                        if ($_etanol <= 0.7 * $_gasolina) {
                            echo "Vale mais a pena abastecer com etanol!";
                        } else {
                            echo "Vale mais a pena abastecer com Gasolina!";
                        }
                    }
            }
        }
        ?>

        </h4>
    </div>
</body>

</html>