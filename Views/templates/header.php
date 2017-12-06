<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php">ToDoList</a>
                <?php
                    if(isset($user))
                        echo '<form method="post" action="index.php?action=signin">
                                <h3> Welcome '.$user['username'].' </h3>
                                <button >Sign in </button>
                              </form>';
                    else
                        echo '<form method="post" action="index.php?action=signout">
                                <button >Sign out </button>
                              </form>';
                ?>
                <a class="navbar-brand" href="index.php?action=register.php">Register</a>
            </div>
        </div>
    </nav>
</header>


