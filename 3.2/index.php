<?php
error_reporting(E_ALL);

// Напишите функцию, которая принимает на вход два аргумента – число (1..31) и номер месяца (1..12). Возвращает правильно сформированную дату на русском языке. Например: «1 января» или «9 мая»

$months_array = [
    1 => 'января',
    2 => 'февраля',
    3 => 'марта',
    4 => 'апреля',
    5 => 'мая',
    6 => 'июня',
    7 => 'июля',
    8 => 'августа',
    9 => 'сентября',
    10 => 'октября',
    11 => 'ноября',
    12 => 'декабря'
];



function get_date1($day, $month): string
{

    global $months_array;
    $numbers = range(1, 31);
    $d = '';
    $m = '';

    if (array_key_exists($month, $months_array)) {
        $m = $months_array[$month];
    } else {
        echo "Такого месяца нет\n";
    }

    if (in_array($day, $numbers)) {
        $d = $day;
    } else {
        echo "Число должно быть в диапазоне 1-31\n";
    }

    if (empty($d) || empty($m)) {
        return '';
    } else {
        return "«{$d} {$m}»\n";
    }
}


function get_date2($day, $month): string
{
    global $months_array;
    $numbers = range(1, 31);

    if (array_key_exists($month, $months_array) && in_array($day, $numbers)) {
        return "«{$day} {$months_array[$month]}»\n";
    }

    return "Ошибка даты или числа" . PHP_EOL;
}



echo get_date1(9, 5);
echo get_date2(31, 12);
