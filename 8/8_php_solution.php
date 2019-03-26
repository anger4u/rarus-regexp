<?php

declare(strict_types=1);

/**
 * Проверка является ли заданная строка IP адресом, записанным в десятичном виде
 *
 * @param string $foo
 *
 * @return bool
 */
function ipCheck(string $foo) {
    if (!empty($foo)) {
        $result = false;

        if(filter_var($foo, FILTER_VALIDATE_IP)) {
            $result = true;
        }
    } else {
        throw new InvalidArgumentException('Ошибка, пустая строка!');
    }

    return ($result);
}

echo "<pre>";
var_dump(ipCheck('127.0.0.1'));
var_dump(ipCheck('255.255.255.0'));
var_dump(ipCheck('192.168.0.1'));
var_dump(ipCheck('1300.6.7.8'));
var_dump(ipCheck('abc.def.gha.bcd'));
var_dump(ipCheck('254.hzf.bar.10 '));
var_dump(ipCheck(''));
echo "</pre>";