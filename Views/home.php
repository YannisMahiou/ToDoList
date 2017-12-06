<?php if(isset($allLists)) { ?>
    <!DOCTYPE html>
    <html lang="fr">
    <?php include($rep . $template['header']) ?>
    <body>
    <?php include($rep . $template['head']); ?>
    <div class="container">
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
    <?php
}else
    require_once($rep.view['404']); ?>