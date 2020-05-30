<?php require __DIR__ . '/../inicio-html.php'; ?>

<div class="jumbotron">
    <h1><?= $titulo; ?></h1>
</div>

<a href="/nova-formacao" class="btn btn-primary mb-2">Nova Formação</a>

<ul class="list-group">
    <?php foreach ($formacoes as $formacao): ?>
    <li class="list-group-item d-flex justify-content-between">
        <?= $formacao->getDescricao(); ?>

        <span>
            <a href="/excluir-formacao?id=<?= $formacao->getId(); ?>" class="btn btn-sm btn-danger">
                Excluir
            </a>
        </span>
    </li>
    <?php endforeach; ?>
</ul>

<?php require __DIR__ . '/../fim-html.php'; ?>