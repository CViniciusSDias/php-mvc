<?php

namespace Alura\Armazenamento\Entity;

/**
 * @Entity
 * @Table(name="locais")
 */
class Local
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

    public function __construct(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }
}
