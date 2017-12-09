<?php if(isset($allLists)) { ?>
    <!DOCTYPE html>
    <html lang="fr">
    <?php include($rep . $template['head']) ?>
    <body>
    <?php include($rep . $template['header']); ?>
    <div class="container">
        <div class="starter-template" style=" padding-top: 60px">
            <h1>Home Page</h1>
            <?php
            if(count($allLists)>0){
                foreach ($allLists as $list)
                    echo '
                        <div style="width:100%">
                          <h2>'.$list['name'].'</h2>
                        </div>';
            }
            else
                echo '<div class="row justify-content-center"><h1>NO RESULTS</h1></div>';
            ?>
        </div>
    </div>

    </body>
    </html>
<?php
}else
    require_once($rep.view['404']); ?>