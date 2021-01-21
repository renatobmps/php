<?php

require_once './auto_load.php';

use Alura\Banco\Models\Conta\{Titular, ContaCorrente, ContaPoupanca};
use Alura\Banco\Models\{Cpf, Endereco};

$endereco = new Endereco(
    'Rua Custódio Paiva',
    '205, torre 9, apto 34',
    'Jd. São Paulo',
    'São Paulo'
);

$corrente = new ContaCorrente(
    new Titular(
        new Cpf('424.733.668-10'),
        'Renato Brandão Martins Pinheiro Silva',
        $endereco
    )
);

$corrente->depositar(500);
$corrente->sacar(100);

echo "Saldo atual: " . $corrente->getSaldo() . PHP_EOL;

$poupanca = new ContaPoupanca(
    new Titular(
        new Cpf('413.545.138-19'),
        'Fernanda Costa Alves Brandão',
        $endereco
    )
);

$poupanca->depositar(500);
$poupanca->sacar(100);

echo "Saldo atual: " . $poupanca->getSaldo() . PHP_EOL;
