<?php require __DIR__ . '/../inicio-html.php'; ?>

<div class="jumbotron">
    <h1><?= $titulo; ?></h1>
</div>

<ul class="list-group">
    <?php foreach ($locais as $local): ?>
    <li class="list-group-item d-flex justify-content-between">
        <?= $local->getDescricao(); ?>

        <span>
            <a href="/editar-local?id=<?= $local->getId(); ?>" class="btn btn-sm btn-info">
                Editar
            </a>

            <a href="/excluir-local?id=<?= $local->getId(); ?>" class="btn btn-sm btn-danger">
                Excluir
            </a>
        </span>
    </li>
    <?php endforeach; ?>
</ul>

<?php require __DIR__ . '/../fim-html.php'; ?>