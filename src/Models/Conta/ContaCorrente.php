<?php

namespace Alura\Banco\Models\Conta;

use Alura\Banco\Models\Conta\Conta;

class ContaCorrente extends Conta
{
    protected function percentualDeTarifa(): float
    {
        return 0.05;
    }
}
