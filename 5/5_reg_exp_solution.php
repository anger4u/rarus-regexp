<?php

declare(strict_types=1);

/**
 * Функция определения является ли входящая строка шестнадцатиричным идентификатором цвета в HTML
 *
 * @param string $foo
 *
 * @return bool
 */

function colorCheckReg(string $foo)
{
    if (!empty($foo)) {
        $regExp = '/^\#[[:xdigit:]]{6}$/u';
        preg_match($regExp, $foo) ? $result = true : $result = false;
    } else {
        throw new InvalidArgumentException('Ошибка, пустая строка!');
    }

    return ($result);
}

echo "<pre>";
var_dump(colorCheckReg('#FFFFFF'));
var_dump(colorCheckReg('#FF3421'));
var_dump(colorCheckReg('#00ff00'));
var_dump(colorCheckReg('232323'));
var_dump(colorCheckReg('f#fddee'));
var_dump(colorCheckReg('#fd2'));
var_dump(colorCheckReg(''));
echo "</pre>";