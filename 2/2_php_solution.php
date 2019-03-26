<?php

declare(strict_types=1);

/**
 * Функция проверки наличия фигурных скобок у GUID
 *
 * @param string $foo
 *
 * @return bool
 */
function guidCheck(string $foo)
{
    /**
     * Проверяем наличие фигурных скобок в строке и в зависимости от этого задаём значение результата,
     * а также либо обрезаем строку, либо оставляем как есть, либо выбрасываем исключение
     */
    if (substr($foo, 0, 1) === '{' && substr($foo, -1) === '}') {
        $result = true;
        $foo = substr($foo, 1, -1);
    } else if (substr($foo, 0, 1) != '{' && substr($foo, -1) != '}') {
        $result = false;
    } else {
        throw new InvalidArgumentException('GUID введёт неверно!');
    }

    $foo = explode('-', $foo);

    /**
     * Проверяем на количество разбитых частей
     */
    if (count($foo) === 5) {
        $fooCount = [8, 4, 4, 4, 12];

        /**
         * Проверяем каждую часть на количество сивмолов согласно массиву $fooCount
         */
        foreach ($foo as $key => $value) {
            if (strlen($value) === $fooCount[$key]) {
                /**
                 * Проверка на соответствие типа числа
                 */
                if(!ctype_xdigit($value)) {
                    throw new InvalidArgumentException('GUID введёт неверно!');
                }
            } else {
                throw new InvalidArgumentException('GUID введёт неверно!');
            }
        }
    } else {
        throw new InvalidArgumentException('GUID введёт неверно!');
    }

    return ($result);
}

echo "<pre>";
var_dump(guidCheck('{e02fa0e4-01ad-090A-c130-0d05a0008ba0}'));
var_dump(guidCheck('e02fd0e4-00fd-090A-ca30-0d00a0038ba0'));
var_dump(guidCheck('02fa0e4-01ad-090A-c130-0d05a0008ba0}'));
var_dump(guidCheck('e02fd0e400fd090Aca300d00a0038ba0'));
echo "</pre>";