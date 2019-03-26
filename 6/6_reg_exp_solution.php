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
        $regExp = '/^(?:(?:(?:(?:0[1-9]|1[0-9]|2[0-8])[\/](?:0[1-9]|1[012]))|(?:(?:29|30|31)[\/](?:0[13578]|1[02]))' .
        '|(?:(?:29|30)[\/](?:0[4,6,9]|11)))[\/](?:19|[2-9][0-9])\d\d)|(?:29[\/]02[\/](?:19|[2-9][0-9])' .
        '(?:00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96))$/u';

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