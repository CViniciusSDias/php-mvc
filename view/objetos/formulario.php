<?php require __DIR__ . '/../inicio-html.php'; ?>

<div class="jumbotron">
    <h1><?= $titulo; ?></h1>
</div>

<form method="post" action="/salvar-objeto<?= isset($objeto) && $objeto->getId() ? '?id=' . $objeto->getId() : ''; ?>">
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" value="<?= isset($objeto) ? $objeto->getDescricao() : ''; ?>">
    </div>

    <div class="form-group">
        <label for="tamanho">Tamanho</label>
        <input type="number" class="form-control" id="tamanho" name="tamanho" value="<?= isset($objeto) ? $objeto->getTamanho() : ''; ?>">
    </div>

    <div class="form-group">
        <label for="unidade_medida">Unidade de Medida</label>
        <input type="text" class="form-control" id="unidade_medida" name="unidade_medida" value="<?= isset($objeto) ? $objeto->getUnidadeMedida() : ''; ?>">
    </div>

    <div class="form-group">
        <label for="local_id">Local</label>
        <select name="local_id" id="local_id" class="form-control">
            <option>Selecione</option>
            <?php foreach ($locais as $local): ?>
            <option value="<?= $local->getId(); ?>" <?= isset($objeto) && $objeto->getIdLocal() === $local->getId() ? 'selected' : ''; ?>>
                <?= $local->getDescricao(); ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<?php require __DIR__ . '/../fim-html.php'; ?>