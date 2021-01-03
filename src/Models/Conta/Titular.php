<?php

namespace Alura\Banco\Models\Conta;

use Alura\Banco\Models\Pessoa;
use Alura\Banco\Models\Endereco;
use Alura\Banco\Models\Cpf;

class Titular extends Pessoa
{
    private Endereco $endereco;

    public function __construct(Cpf $cpf, string $nome, Endereco $endereco)
    {
        parent::__construct($nome, $cpf);
        $this->endereco = $endereco;
    }
    
    // $endereco
    public function getEndereco(): string
    {
        return $this->endereco->getEndereco();
    }
}