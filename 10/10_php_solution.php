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
function numCheck(string $foo) {
    if (!empty($foo)) {
        $result = false;

        if ((int)$foo >= 100000 && (int)$foo <= 999999) {
            $result = true;
        }
    } else {
        throw new InvalidArgumentException('Ошибка, пустая строка!');
    }

    return ($result);
}

echo "<pre>";
var_dump(numCheck('123456'));
var_dump(numCheck('234567'));
var_dump(numCheck('1234567'));
var_dump(numCheck('12345'));
var_dump(numCheck(''));
echo "</pre>";