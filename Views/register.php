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
            <a class="navbar-brand" href="index.php">ToDoList</a>
        </div>
    </div>
</nav>
<div class ="container">
    <div class="starter-template" style=" padding-top: 60px">
        <h1>Register</h1>
        <form name="frmRegistration" method="post" action="">
        <table border="0" width="500" align="center" class="demo-table">
            <tr>
                <td>User Name</td>
                <td><input type="text" class="demoInputBox" name="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>"></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" class="demoInputBox" name="firstName" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" class="demoInputBox" name="lastName" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" class="demoInputBox" name="password" value=""></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" class="demoInputBox" name="confirm_password" value=""></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" class="demoInputBox" name="userEmail" value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>"></td>
            </tr>
            <tr>
                <td colspan=2>
                    <input type="submit" name="register-user" value="Register" class="btnRegister">
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>
</body>
</html>


<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
