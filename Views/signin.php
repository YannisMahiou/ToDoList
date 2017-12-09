<!DOCTYPE html>
<html lang="fr">

    <?php include($rep . $template['header']) ?>

    <body>
        <?php include($rep . $template['head']); ?>
        <div class="container">
          <form class="form-signin" method="post" action="index.php?action=signin">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" id="inputUsername" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </form>
        </div>
    </body>
</html>
