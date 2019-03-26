<?php

declare(strict_types=1);

/**
 * Функция определения является ли данная строчка датой в формате dd/mm/yyyy. Начиная с 1600 года до 9999 года
 *
 * @param string $foo
 *
 * @return bool
 */

function timeCheck(string $foo)
{
    if (!empty($foo)) {
        $result = false;
        $foo = explode('/', $foo);

        if (checkdate((int) $foo[1], (int) $foo[0], (int) $foo[2])
            && $foo[2] >= 1600 && $foo[2] <= 9999
            && strlen($foo[0]) === 2
            && strlen($foo[1]) === 2) {

//            print_r(gettype($foo[0])) ;
//
//            print_r($foo[0]);
                $result = true;

        }
    } else {
        throw new InvalidArgumentException('Ошибка, пустая строка!');
    }

    return ($result);
}

echo "<pre>";
var_dump(timeCheck('29/02/2000'));
var_dump(timeCheck('30/04/2003'));
var_dump(timeCheck('01/01/2003'));
var_dump(timeCheck('29/02/2001'));
var_dump(timeCheck('30-04-2003'));
var_dump(timeCheck('1/1/1899'));
var_dump(timeCheck(''));
echo "</pre>";