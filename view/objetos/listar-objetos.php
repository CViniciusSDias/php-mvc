<?php $titulo = 'Listagem de Objetos'; require __DIR__ . '/../inicio-html.php'; ?>

<div class="jumbotron">
    <h1><?= $titulo; ?></h1>
</div>

<ul>
    <?php foreach ($objetoList as $objeto): ?>
    <li><?= $objeto->getDescricao(); ?></li>
    <?php endforeach; ?>
</ul>

<?php require __DIR__ . '/../fim-html.php'; ?>