<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $titulo ?? 'Armazenamento de Objetos'; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php if (isset($_SESSION['logado'])): ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
    <div class="collapse navbar-collapse d-flex justify-content-between">
        <div>
            <a class="navbar-brand mr-3" href="/listar-cursos">Cursos</a>
            <a class="navbar-brand" href="/listar-formacoes">Formações</a>
        </div>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/logout">Sair</a>
            </li>
        </ul>
    </div>
</nav>
<?php endif; ?>

<div class="container">
    <?php if (isset($_SESSION['mensagem_flash'])): ?>
    <div class="alert alert-<?= $_SESSION['tipo_mensagem']; ?>">
        <?= $_SESSION['mensagem_flash']; ?>
    </div>
    <?php
        unset($_SESSION['mensagem_flash']);
        unset($_SESSION['tipo_mensagem']);
    endif; ?>
