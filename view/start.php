<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Konwerter temperatur</title>
</head>
<body>
    <h1>To jest strona startowa projektu.</h1>
    <p>
        Wiadomość na dziś:
        <strong>
            <?php echo $msg; ?>
        </strong>
        <- pogrubiona wiadomość przekazana ze zmiennej 'msg' w tablicy
        parametrów.
    </p>
    <br/>
    <hr/>
    <br/>
    <?php echo $temp_c; ?>
    to
    <?php echo sprintf(
        '%s (wartość: %s, jednostka: %s)',
        $temp_k,
        $temp_k->getTemperature(),
        $temp_k->getUnit()->getUnit()
    ); ?>
    <hr/>
    <h4>Czasem warto sobie wyświetlić wszystkie dodatkowe informacje:</h4>
    <pre>
<?php var_dump($msg, $temp_c, $temp_k); ?>
    </pre>
</body>
</html>
