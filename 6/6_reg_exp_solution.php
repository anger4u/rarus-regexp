<?php

declare(strict_types=1);

/**
 * Функция определения является ли данная строчка датой в формате dd/mm/yyyy. Начиная с 1600 года до 9999 года
 * через регулярное выражение
 *
 * @param string $foo
 *
 * @return bool
 */

function timeCheckReg(string $foo)
{
    if (!empty($foo)) {
        $regExp = '/^(0\d|[12]\d|3[01])\/(0[1-9]|1[0-2])\/([1-9]|[6-9]|\d){4}$/u';
        preg_match($regExp, $foo) ? $result = true : $result = false;
    } else {
        throw new InvalidArgumentException('Ошибка, пустая строка!');
    }

    return ($result);
}

echo "<pre>";
var_dump(timeCheckReg('29/02/2000'));
var_dump(timeCheckReg('30/04/2003'));
var_dump(timeCheckReg('01/01/2003'));
var_dump(timeCheckReg('29/02/2001'));
var_dump(timeCheckReg('30-04-2003'));
var_dump(timeCheckReg('1/1/1899 '));
var_dump(timeCheckReg(''));
echo "</pre>";