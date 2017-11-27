<html>
<head><title>Erreur</title></head>
    <body>

    <h1>ERREUR !!!!!</h1>
    <?php
    if (isset($dErrorView)) {
        foreach ($dErrorView as $value){
            echo $value;
        }
    }
    ?>
    </body>
</html>