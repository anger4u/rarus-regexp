<?php

declare(strict_types=1);

/**
 * Функция проверки на соответствие входной строки
 *
 * @param string $foo
 *
 * @return bool
 */

function strCheck(string $foo)
{
    if (!empty($foo)) {
        $initStr = 'abcdefdhsf^dsdsвВВo*18340';
        $initStr === $foo ? $result = true : $result = false;
    } else {
        throw new InvalidArgumentException('Ошибка, пустая строка!');
    }

    return $result;
}

echo "<pre>";
var_dump(strCheck('abcdefdhsf^dsdsвВВo*18340'));
var_dump(strCheck('abcdefghijklmnoasdfasdpqrstuv18340'));
var_dump(strCheckReg(""));
echo "</pre>";