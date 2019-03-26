<?php

declare(strict_types=1);

/**
 * Определение является ли входящая строка правильным MAC адресом
 *
 * @param string $foo
 *
 * @return bool
 */
function macCheck(string $foo) {
    if(!empty($foo)) {
        $regExp ='/^[[:xdigit:]]{2}\:[[:xdigit:]]{2}\:[[:xdigit:]]{2}\:[[:xdigit:]]{2}\:[[:xdigit:]]{2}\:[[:xdigit:]]{2}$/u';
        preg_match($regExp, $foo) ? $result = true : $result = false;
    } else {
        throw new InvalidArgumentException('Ошибка, пустая строка!');
    }

    return($result);
}

echo "<pre>";
var_dump(macCheck('01:32:54:67:89:AB'));
var_dump(macCheck('aE:dC:cA:56:76:54'));
var_dump(macCheck('01:33:47:65:89:ab:cd'));
var_dump(macCheck('01:23:45:67:89:Az'));
var_dump(macCheck(''));
echo "</pre>";