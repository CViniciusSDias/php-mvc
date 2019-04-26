<?php $titulo = 'Listagem de Objetos'; require __DIR__ . '/../inicio-html.php'; ?>

<div class="jumbotron">
    <h1><?= $titulo; ?></h1>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Descrição</th>
            <th>Tamanho</th>
            <th>Unidade de Medida</th>
            <th>Local</th>
            <th width="150"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($objetoList as $objeto): ?>
    <tr>
        <td><?= $objeto->getDescricao(); ?></td>
        <td><?= $objeto->getTamanho(); ?></td>
        <td><?= $objeto->getUnidadeMedida(); ?></td>
        <td><?= $objeto->getDescricaoLocal(); ?></td>
        <td>
            <a href="#" class="btn btn-sm btn-info">
                Editar
            </a>

            <a href="#" class="btn btn-sm btn-danger">
                Excluir
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require __DIR__ . '/../fim-html.php'; ?>