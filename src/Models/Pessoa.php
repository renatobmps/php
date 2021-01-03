<?php

namespace Alura\Banco\Models;

class Pessoa
{
    protected string $nome;
    private Cpf $cpf;

    public function __construct(string $nome, Cpf $cpf)
    {
        $this->validaNome($nome);
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    protected function validaNome(string $nome): void
    {
        if (strlen($nome) < 5) {
            echo "Nome precisa ter no mínimo 5 caracteres";
            exit();
        }
    }
    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCpf(): string
    {
        return $this->cpf->getCpf();
    }
}
