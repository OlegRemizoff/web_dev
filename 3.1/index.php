<?php
error_reporting(E_ALL);


// Напишите функцию, которая вычисляет доход по вкладу. В качестве аргумента принимается сумма вклада, срок в месяцах, годовой процент. Возвращается сумма вклада по окончанию срока.

// S — итоговая сумма, P - начальная сумма вклада, r - месячная процентная ставка (годовая ставка / 12 / 100), n — количество месяцев.

// S=P*(1+r)**n




function get_deposit(float $amount, int $month, float $percent): float
{
    $monthlyRate = $percent / 100 / 12; 
    $total = $amount * (1 + $monthlyRate) ** $month;
    return $total; 
}


echo get_deposit(100000.00, 12, 5.5);