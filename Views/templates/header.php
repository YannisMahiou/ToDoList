<header>
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php">ToDoList</a>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class = "nav-item ">
                    <?php if(!isset($user)) echo '<a class="nav-link" href="index.php?action=register">Register</a>'; ?>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <?php
            if(isset($user)) {
                echo '<form class="form-inline my-2 my-lg-0" method="post" action="index.php?action=signout">
                                        <button class="btn btn-outline-secondary my-2 my-sm-0">Sign out </button>
                                      </form>';
            }else{
                echo '<form class="form-inline my-2 my-lg-0" method="post" action="index.php?action=signin">
                                        <button class="btn btn-outline-secondary my-2 my-sm-0">Sign in </button>
                                      </form>';
            }?>
        </div>
    </nav>
</header>
