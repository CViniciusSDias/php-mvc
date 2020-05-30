#language: pt
Funcionalidade: Cadastro de formações
  Eu, como instrutor
  Quero cadastrar formações
  Para organizar meus cursos

  Regras:
  - Formação precisa ter uma descrição
  - Descrição precisa ter pelo menos 2 palavras

  @unidade
  Cenário: Criação de formação com 1 palavra
    Quando eu tentar criar uma formação com a descrição "PHP"
    Então eu vou ver a seguinte mensagem de erro "Descrição precisa ter pelo menos 2 palavras"

  @unidade
  Cenário: Criação de formação válida
    Quando eu tentar criar uma formação com a descrição "PHP na web"
    Então eu devo ter uma formação criada com a descrição "PHP na web"

  @integracao
  Cenário: Cadastro de formação válida deve salvar no banco
    Dado que estou conectado ao banco de dados
    Quando tento salvar uma nova formação com a descrição "PHP na web"
    Então se eu buscar no banco, devo encontar essa formação
