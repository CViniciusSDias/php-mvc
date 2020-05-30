#language: pt
Funcionalidade: Excluir formações
  Eu, como instrutor
  Quero poder excluir uma formação
  Para poder organizar minha lista de formações

  @e2e
  Cenário: Excluir formação existente
    Dado estou em "/login"
    E preencho "email" com "vinicius@alura.com.br"
    E preencho "senha" com "123456"
    E pressiono "Fazer Login"
    E sigo o link "Formações"
    Quando sigo o link "Excluir"
    Então devo ver "Formação excluída com sucesso"