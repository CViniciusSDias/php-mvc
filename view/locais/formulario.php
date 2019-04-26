<?php require __DIR__ . '/../inicio-html.php'; ?>

<div class="jumbotron">
    <h1><?= $titulo; ?></h1>
</div>

<form method="post" action="/salvar-local">
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<?php require __DIR__ . '/../fim-html.php'; ?>