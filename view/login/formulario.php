<?php require __DIR__ . '/../inicio-html.php'; ?>

    <div class="jumbotron">
        <h1><?= $titulo; ?></h1>
    </div>

    <form method="post" action="/fazer-login">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" required class="form-control" id="email" name="email" autofocus>
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" required class="form-control" id="senha" name="senha">
        </div>

        <button type="submit" class="btn btn-primary">Fazer Login</button>
    </form>

<?php require __DIR__ . '/../fim-html.php'; ?>