<?php

namespace Alura\Banco\Models;

class Cpf
{
    private string $numero;

    public function __construct(string $cpf)
    {
        $this->validaCpf($cpf);
        $this->setCpf($cpf);
    }
    private function setCpf(string $numero): void
    {
        $this->numero = $numero;
    }
    private function validaCpf(string $cpf): void
    {
        $cpf = filter_var($cpf, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);
        if ($cpf === false) {
            echo "CPF inválido";
            exit();
        }
        $simbolos = ['.', '-'];
        $cpfSemPontos = str_replace($simbolos, '', $cpf);
        $cpfFatiado = str_split($cpfSemPontos, 1);
        // Regras do primeiro validador
        $indicePrimeiro = 1;
        $arrPrimeiro = [];
        foreach ($cpfFatiado as $n) {
            $int = intval($n);
            array_push($arrPrimeiro, $int * $indicePrimeiro);
            $indicePrimeiro++;
        }
        $totalPrimeiro = $arrPrimeiro[0] + $arrPrimeiro[1] + $arrPrimeiro[2] + $arrPrimeiro[3] + $arrPrimeiro[4] + $arrPrimeiro[5] + $arrPrimeiro[6] + $arrPrimeiro[7] + $arrPrimeiro[8];
        $primeiroDigito = $totalPrimeiro % 11;
        if ($primeiroDigito == 10) {
            $primeiroDigito = 0;
        }
        // Regras do segundo validador
        $indiceSegundo = 0;
        $arrSegundo = [];
        foreach ($cpfFatiado as $n) {
            $int = intval($n);
            array_push($arrSegundo, $int * $indiceSegundo);
            $indiceSegundo++;
        }
        $totalSegundo = $arrSegundo[0] + $arrSegundo[1] + $arrSegundo[2] + $arrSegundo[3] + $arrSegundo[4] + $arrSegundo[5] + $arrSegundo[6] + $arrSegundo[7] + $arrSegundo[8] + $arrSegundo[9];
        $segundoDigito = $totalSegundo % 11;
        if ($segundoDigito == 10) {
            $segundoDigito = 0;
        }
        // Resultados do dígito validador
        $digitoCorreto = $primeiroDigito . $segundoDigito;
        $digitoInformado = $cpfFatiado[9] . $cpfFatiado[10];

        if ($digitoInformado != $digitoCorreto) {
            echo "CPF não atende ao padrão";
            exit();
        }
    }
    public function getCpf(): string
    {
        return $this->numero;
    }
}
