<?php

namespace Alura\Banco\Models\Conta;

use Alura\Banco\Models\Conta\Conta;

class ContaPoupanca extends Conta
{
    protected function percentualDeTarifa(): float
    {
        return 0.03;
    }
}
