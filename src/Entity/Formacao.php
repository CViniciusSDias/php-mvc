<?php

namespace Alura\Armazenamento\Entity;

/**
 * @Entity
 * @Table(name="formacoes")
 */
class Formacao
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @Column(type="string")
     */
    private string $descricao = '';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        if (count(explode(' ', $descricao)) < 2) {
            throw new \InvalidArgumentException(
                'Descrição precisa ter pelo menos 2 palavras'
            );
        }
        $this->descricao = $descricao;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
