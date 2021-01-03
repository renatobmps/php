<?php

include 'auto_load.php';

use Alura\Banco\Models\Conta\Titular;
use Alura\Banco\Models\Endereco;
use Alura\Banco\Models\Cpf;
use Alura\Banco\Models\Conta\Conta;
use Alura\Banco\Models\Funcionario;

$endereco = new Endereco('Rua Custódio Paiva', '205 - Torre 9, apto 34.', 'Jd. São Paulo', 'São Paulo / SP');
$primeiraConta = new Conta(new Titular(new Cpf('424.733.668-10'), 'Renato Brandão', $endereco));
$segundaConta = new Conta(new Titular(new Cpf('413.545.138-19'), 'Fernanda Costa', $endereco));

$primeiraConta->depositar(1800);
$primeiraConta->sacar(25);
$primeiraConta->transferir($segundaConta, 250);
echo "R$ ".$primeiraConta->getSaldo() . PHP_EOL;
echo "R$ ".$segundaConta->getSaldo() . PHP_EOL;
echo $primeiraConta->getNome() . PHP_EOL;
echo $segundaConta->getCpf() . PHP_EOL;
echo $primeiraConta->getEndereco() . PHP_EOL;

// var_dump($primeiraConta);

$funcionario = new Funcionario('Renato', new Cpf('424.733.668-10'), 'Desenvolvedor');
$funcionario->alteraNome('Renato Brandão Martins Pinheiro Silva');
echo $funcionario->getNome() . PHP_EOL;
echo $funcionario->getCpf() . PHP_EOL;
echo $funcionario->getCargo() . PHP_EOL;

// var_dump($funcionario);