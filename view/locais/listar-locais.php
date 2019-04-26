<?php $titulo = 'Listagem de Locais'; require __DIR__ . '/../inicio-html.php'; ?>

<div class="jumbotron">
    <h1><?= $titulo; ?></h1>
</div>

<ul class="list-group">
    <?php foreach ($locais as $local): ?>
    <li class="list-group-item"><?= $local->getDescricao(); ?></li>
    <?php endforeach; ?>
</ul>

<?php require __DIR__ . '/../fim-html.php'; ?>