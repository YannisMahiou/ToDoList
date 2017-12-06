<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ToDoList application</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.php">ToDoList</a>
            <a class="navbar-brand" href="register.php">Register</a>
        </div>
    </div>
</nav>
<div class ="container">
    <div class="starter-template" style=" padding-top: 60px">
        <h1>Home Page</h1>
        <ul>
            <?php foreach ($tlist as $list): ?>

                <li> <?= $list->name; ?> </li>

            <?php endforeach; ?>
        </ul>
    </div>
</div>
</body>
</html>


