<?php require __DIR__ . '/../inicio-html.php'; ?>

<div class="jumbotron">
    <h1><?= $titulo; ?></h1>
</div>

<form method="post" action="/salvar-formacao<?= $formacao->getId() ? '?id=' . $formacao->getId() : ''; ?>">
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $formacao->getDescricao(); ?>" autofocus>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="/listar-formacoes" class="btn btn-secondary">Cancelar</a>
</form>

<?php require __DIR__ . '/../fim-html.php'; ?>