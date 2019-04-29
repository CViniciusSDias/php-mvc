<?php

namespace Alura\Armazenamento\Entity;

/**
 * @Entity
 * @Table(name="objetos")
 */
class Objeto
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $descricao;
    /**
     * @Column(type="float")
     */
    private $tamanho;
    /**
     * @Column(name="unidade_medida", type="string")
     */
    private $unidadeMedida;

    /**
     * @ManyToOne(targetEntity="Local")
     */
    private $local;

    public function __construct(string $descricao, int $tamanho, string $unidadeMedida, Local $local = null)
    {
        $this->descricao = $descricao;
        $this->tamanho = $tamanho;
        $this->unidadeMedida = $unidadeMedida;
        $this->local = $local;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getTamanho(): float
    {
        return $this->tamanho;
    }

    public function getUnidadeMedida(): string
    {
        return $this->unidadeMedida;
    }

    public function armazenarEm(Local $local)
    {
        $this->local = $local;
    }

    public function getIdLocal(): int
    {
        return $this->local->getId();
    }

    public function getDescricaoLocal(): string
    {
        return isset($this->local) ? $this->local->getDescricao() : '';
    }
}
