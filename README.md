# Introdução ao MVC com PHP

Repositório que contém um simples projeto de cadastro de cursos em PHP usando Doctrine ORM e os pacotes de PSR-7 nyholm/psr7 e nyholm/psr7-server.

## Ambiente necessário

Para executar este sistema é necessário ter instalado:

- Composer
- PHP (>= 8.1)
    - PDO SQLite

### Docker

A imagem oficial do PHP já possui o ambiente necessário para executar este sistema, caso você não deseje instalar
as dependências (PHP e Composer) separadamente. Os exemplos a seguir partem do princípio que `Docker` será utilizado.

## Iniciar o sistema

Antes de mais nada, é preciso instalar os componentes utilizados pelo sistema. Para isso, execute:

```
docker run --rm -itv $(pwd):/app -w /app -u $(id -u):$(id -g) composer update
```

Para inicializar o sistema, o primeiro passo é criar o banco de dados. Para isso, crie um arquivo vazio chamado db.sqlite
na raiz deste projeto.

Depois, execute o seguinte comando: 
```
docker run --rm -itv $(pwd):/app -w /app -u $(id -u):$(id -g) php:8.2 php bin/doctrine orm:schema-tool:create
```

Este comando criará a estrutura do banco de dados SQLite. Agora vamos inserir um usuário com e-mail `email@example.com` e senha `123456`:

```
docker run --rm -itv $(pwd):/app -w /app -u $(id -u):$(id -g) php:8.2 php bin/doctrine dbal:run-sql "INSERT INTO usuarios (email, senha) VALUES ('email@example.com', '\$argon2i\$v=19\$m=65536,t=4,p=1\$WHpBb1FzTDVpTmQubU55bA\$jtZiWSSbmw1Ru4tYEq1SzShrMu0ap2PjblRQRubNPgo');"
```

Tendo feito isso, basta subir um servidor de testes. Isso pode ser feito com:

```
docker run -itv $(pwd):/app -w /app -u $(id -u):$(id -g) -p 8080:8080 php:8.2 php -S 0.0.0.0:8080 -t public
```

Pronto! Basta acessar no seu navegador o endereço http://localhost:8080/ e começar a interagir com o sistema.