<?php

namespace Alura\Banco\Models;

class Endereco
{
    private string $rua;
    private string $numero;
    private string $bairro;
    private string $cidade;

    public function __construct(string $rua, string $numero, string $bairro, string $cidade)
    {
        $this->rua = $rua;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
    }

    public function getRua(): string
    {
        return $this->rua;
    }
    public function getNumero(): string
    {
        return $this->numero;
    }
    public function getBairro(): string
    {
        return $this->bairro;
    }
    public function getCidade(): string
    {
        return $this->cidade;
    }
    public function getEndereco(): string
    {
        return $this->getRua() . ", " . $this->getNumero() . " - " . $this->getBairro() . " - " . $this->getCidade();
    }
}
