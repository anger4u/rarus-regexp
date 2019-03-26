<?php

declare(strict_types=1);

/**
 * Проверка является ли заданная строка IP адресом, записанным в десятичном виде через регулярное выражение
 *
 * @param string $foo
 *
 * @return bool
 */
function ipCheckReg(string $foo) {
    if (!empty($foo)) {
        $regExp = '/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)' .
            '\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/u';
        preg_match($regExp, $foo) ? $result = true : $result = false;
    } else {
        throw new InvalidArgumentException('Ошибка, пустая строка!');
    }

    return ($result);
}

echo "<pre>";
var_dump(ipCheckReg('127.0.0.1'));
var_dump(ipCheckReg('255.255.255.0'));
var_dump(ipCheckReg('192.168.0.1'));
var_dump(ipCheckReg('1300.6.7.8'));
var_dump(ipCheckReg('abc.def.gha.bcd'));
var_dump(ipCheckReg('254.hzf.bar.10 '));
var_dump(ipCheckReg(''));
echo "</pre>";