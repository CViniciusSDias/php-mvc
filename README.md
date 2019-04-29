# Introdução ao MVC com PHP

Repositório que contém o código utilizado para criação do curso de Introdução ao MVC com PHP.

## Ambiente necessário

Para executar este sistema é necessário ter instalado:

- Composer
- PHP (>= 7.3)
    - PDO SQLite

### Docker

A imagem oficial do PHP (php:latest) já possui o ambiente necessário para executar este sistema, caso não deseje instalar
as dependências (PHP e Composer) separadamente. Os exemplos a seguir partem do princípio que `Docker` será utilizado.

## Iniciar o sistema

Antes de mais nada, é preciso instalar os componentes utilizados pelo sistema. Para isso, execute:

```
$ docker run --rm -itv $(pwd):/app -w /app -u $(id -u):$(id -g) composer install --ignore-platform-reqs
```

Para inicializar o sistema, o primeiro passo é criar o banco de dados. Para isso, crie um arquivo vazio chamado db.sqlite
na raiz deste projeto.

Depois, execute o seguinte comando: 
```
$ docker run --rm -itv $(pwd):/app -w /app -u $(id -u):$(id -g) php:7.3-cli php vendor/bin/doctrine orm:schema-tool:create
```

Este comando criará a estrutura do banco de dados SQLite.

Tendo feito isso, basta subir um servidor de testes. Isso pode ser feito com:

```
docker run -itv $(pwd):/app -w /app -u $(id -u):$(id -g) -p 8080:8080 php:7.3-cli php -S 0.0.0.0:8080 -t public
```

Pronto! Basta acessar em seu navegador o endereço http://localhost:8080/novo-local e começar a interagir com o sistema.