<?php

use Alura\Armazenamento\Entity\Formacao;
use Alura\Armazenamento\Infra\EntitymanagerCreator;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private EntityManagerInterface $em;
    private string $mensagemDeErro = '';
    private int $idFormacaoInserida;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @When eu tentar criar uma formação com a descrição :arg1
     */
    public function euTentarCriarUmaFormacaoComADescricao(string $descricaoFormacao)
    {
        $formacao = new Formacao();

        try {
            $formacao->setDescricao($descricaoFormacao);
        } catch (\InvalidArgumentException $exception) {
            $this->mensagemDeErro = $exception->getMessage();
        }
    }

    /**
     * @Then eu vou ver a seguinte mensagem de erro :arg1
     */
    public function euVouVerASeguinteMensagemDeErro(string $mensagemDeErro)
    {
        assert($mensagemDeErro === $this->mensagemDeErro);
    }

    /**
     * @Given que estou conectado ao banco de dados
     */
    public function queEstouConectadoAoBancoDeDados()
    {
        $this->em = (new EntitymanagerCreator())->getEntityManager();
    }

    /**
     * @When tento salvar uma nova formação com a descrição :arg1
     */
    public function tentoSalvarUmaNovaFormacaoComADescricao(string $descricaoFormacao)
    {
        $formacao = new Formacao();
        $formacao->setDescricao($descricaoFormacao);

        $this->em->persist($formacao);
        $this->em->flush();

        $this->idFormacaoInserida = $formacao->getId();
    }

    /**
     * @Then se eu buscar no banco, devo encontar essa formação
     */
    public function seEuBuscarNoBancoDevoEncontarEssaFormacao()
    {
        /** @var \Doctrine\Persistence\ObjectRepository $repositorio */
        $repositorio = $this->em->getRepository(Formacao::class);
        /** @var Formacao $formacao */
        $formacao = $repositorio->find($this->idFormacaoInserida);

        assert($formacao instanceof Formacao);
    }
}
