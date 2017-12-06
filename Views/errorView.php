<html>
    <head>
        <title> Errors </title>
    </head>
        <body>
            <?php
            if (isset($errors)) {
                foreach ($errors as $value){
                    echo $value;
                }
            }
            ?>
        </body>
</html>
