<?php

namespace App\Library;

use Illuminate\Support\Collection;

class Math
{

    protected array $equation = [];

    private string $operations = '';

    private array $allowedOperators = [];

    private bool $usePrecedence = false;

    /**
     *
     * Setups the operator and its precedence
     * Struct of `$operator=['+'=>1,'*'=>2]`
     *
     */
    public function __construct($usePrecedence = false)
    {

        $this->usePrecedence = $usePrecedence;
        $this->allowedOperators = [
            env('CALC_ADD_ICON') => env('CALC_ADD_PRECEDENCE'),
            env('CALC_SUB_ICON') => env('CALC_SUB_PRECEDENCE'),
            env('CALC_MULTI_ICON') => env('CALC_MULTI_PRECEDENCE'),
            env('CALC_DIV_ICON') => env('CALC_DIV_PRECEDENCE'),
        ];
        $this->operatorMap = [
            env('CALC_ADD_ICON') => 'addition',
            env('CALC_SUB_ICON') => 'subtraction',
            env('CALC_MULTI_ICON') => 'multiplication',
            env('CALC_DIV_ICON') => 'division',
        ];

    }



    public function setEquation($_equation): static
    {
        $this->equation = $_equation;
        return $this;
    }

    public function getEquation(): array
    {
        return $this->equation;
    }

    public function getResult()
    {
        $parsed = $this->parse();
        if (!$this->usePrecedence) {
            return $this->evaluate($parsed);
        }
        return $this->evaluateRpn($this->convertToRpn($parsed));
    }

    public function parse(): array
    {
        $infix = [''];
        $infixCounter = 0;

        foreach ($this->getEquation() as $item) {
            if ($item['type'] == 'operand') {
                $infix[$infixCounter] .= $item['value'];

            }
            if ($item['type'] == 'operator') {

                $infix[] = $item['value'];
                $infix[] = '';
                $infixCounter = $infixCounter + 2;
            }
        }
        return $infix;
    }

    private function convertToRpn($infix): Collection
    {
        $stack = collect();
        $rpn = collect();
        foreach ($infix as $if) {
            if (in_array($if, array_keys($this->allowedOperators))) {
                if ($stack->isEmpty()) {
                    $stack->push($if);
                    continue;
                }
                while (!$stack->isEmpty() && $this->allowedOperators[$if] <= $this->allowedOperators[$stack->last()]) {
                    $rpn->push($stack->pop());
                }
                $stack->push($if);
            } else {
                $rpn->push($if);
            }
        }
        while ($stack->isNotEmpty()) {
            $rpn->push($stack->pop());
        }

        return $rpn;
    }

    private function evaluateRpn(Collection $rpn)
    {


        foreach ($rpn as $item) {
            if (in_array($item, array_keys($this->allowedOperators))) {
                $rightOp = $rpn->pop();
                $leftOp = $rpn->pop();
                $rpn->push(call_user_func([__NAMESPACE__ . '\MATH', $this->operatorMap[$item]], $leftOp, $rightOp));
                continue;
            }
            $rpn->push($item);
        }
        return $rpn->pop();
    }


    private function addition($a, $b)
    {
        return $a + $b;
    }

    private function subtraction($a, $b)
    {
        return $a - $b;
    }

    private function multiplication($a, $b): float|int
    {
        return $a * $b;
    }

    private function division($a, $b): float|int
    {
        return $a / $b;
    }


    private function evaluate(array $if):float|int
    {
        $stack = collect();
        for ($pointer = 0; $pointer < count($if); $pointer++) {
            if (in_array($if[$pointer], array_keys($this->allowedOperators))) {
                $leftOp = $stack->pop();
                $rightOp = $if[$pointer + 1];
                $stack->push(call_user_func([__NAMESPACE__ . '\MATH', $this->operatorMap[$if[$pointer]]], $leftOp, $rightOp));
                $pointer++;
                continue;
            }
            $stack->push($if[$pointer]);
        }

        return $stack->pop();


    }


}
