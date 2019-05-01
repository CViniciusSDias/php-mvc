<?php require __DIR__ . '/../inicio-html.php'; ?>

<div class="jumbotron">
    <h1><?= $titulo; ?></h1>
</div>

<a href="/novo-curso" class="btn btn-primary mb-2">Novo Curso</a>

<ul class="list-group">
    <?php foreach ($cursos as $curso): ?>
    <li class="list-group-item d-flex justify-content-between">
        <?= $curso->getDescricao(); ?>

        <span>
            <a href="/editar-curso?id=<?= $curso->getId(); ?>" class="btn btn-sm btn-info">
                Editar
            </a>

            <a href="/excluir-curso?id=<?= $curso->getId(); ?>" class="btn btn-sm btn-danger">
                Excluir
            </a>
        </span>
    </li>
    <?php endforeach; ?>
</ul>

<?php require __DIR__ . '/../fim-html.php'; ?>