<?php $titulo = 'Listagem de Objetos'; require __DIR__ . '/../inicio-html.php'; ?>

<ul>
    <?php foreach ($objetoList as $objeto): ?>
    <li><?= $objeto->getDescricao(); ?></li>
    <?php endforeach; ?>
</ul>

<?php require __DIR__ . '/../fim-html.php'; ?>