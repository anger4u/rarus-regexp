<?php

declare(strict_types=1);

/**
 * Функция проверки на соответствие входной строки через регулярное выражение
 *
 * @param string $foo
 *
 * @return bool
 */

function strCheckReg(string $foo)
{
    if (!empty($foo)) {
        $regExp = '/^abcdefdhsf\^dsdsвВВo\*18340$/u';
        preg_match($regExp, $foo) ? $result = true : $result = false;
    } else {
        throw new InvalidArgumentException('Ошибка, пустая строка!');
    }

    return ($result);
}

echo "<pre>";
var_dump(strCheckReg('abcdefdhsf^dsdsвВВo*18340'));
var_dump(strCheckReg('abcdefghijklmnoasdfasdpqrstuv18340'));
var_dump(strCheckReg(''));
echo "</pre>";