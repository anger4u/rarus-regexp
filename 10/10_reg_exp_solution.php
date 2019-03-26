<?php

declare(strict_types=1);

/**
 * Проверка является ли заданная строка шестизначным числом, записанным в десятичной системе счисления
 * без нулей в старших разрядах.
 *
 * @param string $foo
 *
 * @return bool
 */
function numCheckReg(string $foo) {
    if (!empty($foo)) {
        $regExp = '/^[1-9]{1}[0-9]{5}$/u';
        preg_match($regExp, $foo) ? $result = true : $result = false;
    } else {
        throw new InvalidArgumentException('Ошибка, пустая строка!');
    }

    return ($result);
}

echo "<pre>";
var_dump(numCheckReg('123456'));
var_dump(numCheckReg('234567'));
var_dump(numCheckReg('1234567'));
var_dump(numCheckReg('12345'));
var_dump(numCheckReg(''));
echo "</pre>";