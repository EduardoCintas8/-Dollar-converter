<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <h1>Conversor de moedas v2.0</h1>
        <?php

        //url obtida no site do Banco central do Brasil:
        $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\'08-09-2024\'&@dataFinalCotacao=\'08-18-2024\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra';

        //Convertendo a url para json e pegando somente o array que contem o valor atual do Dolar;
        $urlData = json_decode(file_get_contents($url), true);
        $dolarPrice = $urlData["value"][0]["cotacaoCompra"];

        //Pegando a quantia em reais digitada na tela inicial ja convertido para duas casas decimais;
        $quantityReal = number_format($_GET["quantia"] ?? 0, 2);

        // Calculando a quantia em dolar baseado na quantia em reais, ja formatada para duas casas decimais;
        $quantityDolar = number_format($quantityReal / $dolarPrice, 2);

        //Mostrando o resultado na tela;
        echo "Seus R$ $quantityReal equivalem a <strong>U$$quantityDolar</strong>*";
        echo "*<br><br>Cotação obtida diretamente do site do <strong>Banco Central do Brasil</strong>"
        ?>

        <!-- botão para retornar para tela inicial; -->
        <button onclick="javascript:window.location.href='index.html'">Voltar</button>

    </main>
</body>

</html>