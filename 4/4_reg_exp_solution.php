<?php

declare(strict_types=1);

/**
 * Валидация url адреса через регулярное выражение
 *
 * @param string $foo
 *
 * @return bool
 */
function urlCheckReg(string $foo)
{
    if (!empty($foo)) {
        $regExp = '#^(http(?:s)?\:\/\/)?([Ww]{3}\.)?([^\-\.][A-z0-9\-\.]{2,}[^\-\.])\.([A-z]){2,}((\/|\:){1})?([A-z0-9\/\%\_\.\?\&\=\#]{2,})?$#u';
        preg_match($regExp, $foo) ? $result = true : $result = false;
    } else {
        throw new InvalidArgumentException('Ошибка, пустая строка!');
    }

    return ($result);
}

echo "<pre>";
var_dump(urlCheckReg('http://www.zcontest.ru'));
var_dump(urlCheckReg('http://zcontest.ru'));
var_dump(urlCheckReg('http://zcontest.com'));
var_dump(urlCheckReg('https://zcontest.ru'));
var_dump(urlCheckReg('https://sub.zcontest-ru.com:8080'));
var_dump(urlCheckReg('http://zcontest.ru/dir%201/dir_2/program.ext?var1=x&var2=my%20value'));
var_dump(urlCheckReg('zcon.com/index.html#bookmark'));
var_dump(urlCheckReg('Just Text.'));
var_dump(urlCheckReg('http://a.com'));
var_dump(urlCheckReg('http://www.domain-.com'));
var_dump(urlCheckReg(''));
echo "</pre>";