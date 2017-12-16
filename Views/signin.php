<!DOCTYPE html>
<html lang="fr">

    <?php include($rep . $template['header']) ?>

    <body>

        <?php include($rep . $template['head']); ?>

        <div class="container" style="padding-top: 5rem">
          <form class="form-signin" method="post" action="index.php?action=login">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" name="inputUsername" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>

              <?php if(isset($wrong) && $wrong) echo '<div class="alert alert-danger">Wrong username or password !</div>'; ?>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </form>
        </div>
        <?php include($rep.$template['scripts']); ?>
    </body>
</html>
