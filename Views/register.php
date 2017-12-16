<!DOCTYPE html>
<html lang="en">

  <?php require($rep.$template['head']) ?>

<body>

  <?php require($rep.$template['header']) ?>

<div class ="container">
    <div class="starter-template">
        <h1>Register</h1>
        <form name="frmRegistration" method="post" action="index.php?action=addBase">
        <table border="0" width="500" align="center" class="demo-table">
            <tr>
                <td>User Name</td>
                <td><input type="text" class="demoInputBox" name="userName" placeholder="userName" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" class="demoInputBox" name="password" placeholder="password" required></td>
            </tr>
                <td colspan=2>
                    <button type="submit" name="Register" value="Register" class="btnRegister"> Register </button>
                </td>
            </tr>
        </table>
        </form>

        <?php
          if(isset($exists) && $exists)
            echo '<div class="alert alert-danger"> User already exists ! </div>';
          else {
            if(count($errors) > 0){
              echo '<div class="alert alert-danger">';
              foreach ($errors as $err) {
                echo $err;
              }
              echo '</div>';
            }
          }
        ?>

    </div>
  </div>

  <?php include($rep.$template['scripts']); ?>

  </body>
</html>
