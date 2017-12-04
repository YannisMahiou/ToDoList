<h1>Home Page</h1>

<ul>
<?php foreach ($db->executeQuery('SELECT * FROM tlist') as $post): ?>

    <li> <?= $post->name; ?> </li>

<?php endforeach; ?>

</ul>
