<?php

namespace Alura\Banco\Models\Conta;

abstract class Conta
{
    protected float $saldo;
    private Titular $titular;
    private static $numeroDeContas = 0;

    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;
        self::$numeroDeContas++;
    }

    // $saldo
    public function getSaldo(): float
    {
        return $this->saldo;
    }
    public function sacar(float $valorASacar): void
    {
        $taxaDeJuros = $valorASacar * $this->percentualDeTarifa();
        $valorParaSaque = $valorASacar + $taxaDeJuros;
        if ($valorParaSaque > $this->saldo) {
            echo "Saldo insuficiente." . PHP_EOL;
            return;
        }
        if ($valorParaSaque < 0) {
            echo "Só é permitido valores positivos." . PHP_EOL;
            return;
        }
        $this->saldo -= $valorParaSaque;
    }
    public function depositar(float $valorADepositar): void
    {
        if ($valorADepositar < 0) {
            echo "Só é permitido valores positivos." . PHP_EOL;
            return;
        }
        $this->saldo += $valorADepositar;
    }
    public function transferir(Conta $contaBeneficiario, float $valorATransferir): void
    {
        if ($this->saldo < $valorATransferir) {
            echo "Saldo insuficiente." . PHP_EOL;
            return;
        }
        $this->sacar($valorATransferir);
        $contaBeneficiario->depositar($valorATransferir);
    }

    // $titular
    public function getNome(): string
    {
        return $this->titular->getNome();
    }
    public function getCpf(): string
    {
        return $this->titular->getCpf();
    }
    public function getEndereco(): string
    {
        return $this->titular->getEndereco();
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
    }
    abstract protected function percentualDeTarifa(): float;
}
