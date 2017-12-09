<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">ToDoList</a>
                <?php
                    if(isset($user))
                        echo '<form method="post" action="index.php?action=disconnect">
                                <h3> Welcome '.$user['username'].' </h3>
                                <button >Sign out </button>
                              </form>';
                    else
                        echo '<form method="post" action="index.php?action=signin">
                                <button >Sign in </button>
                              </form>';
                ?>
                <a class="navbar-brand" href="index.php?action=register">Register</a>
            </div>
        </div>
    </nav>
</header>


