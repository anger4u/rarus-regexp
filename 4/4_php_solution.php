<?php

declare(strict_types=1);

/**
 * Валидация url адреса
 *
 * @param string $foo
 *
 * @return bool
 */
function urlCheck(string $foo)
{
    if (!empty($foo)) {

        if (strpos($foo, 'http://') === false) {
            $foo = 'http://' . $foo;
        }

        $result = false;
        $fooUrl = parse_url($foo, PHP_URL_HOST);
        $fooArr = explode('.', $fooUrl);

        foreach($fooArr as $item) {
            if (strlen($item) < 2) {
                return false;
            }
        }

        if (filter_var($foo,FILTER_VALIDATE_URL) !== false) {
            $result = true;
        }

    } else {
        throw new InvalidArgumentException('Ошибка, пустая строка!');
    }

    return ($result);
}

echo "<pre>";
var_dump(urlCheck('http://www.zcontest.ru'));
var_dump(urlCheck('http://zcontest.ru'));
var_dump(urlCheck('http://zcontest.com'));
var_dump(urlCheck('https://zcontest.ru'));
var_dump(urlCheck('https://sub.zcontest-ru.com:8080'));
var_dump(urlCheck('http://zcontest.ru/dir%201/dir_2/program.ext?var1=x&var2=my%20value'));
var_dump(urlCheck('zcon.com/index.html#bookmark'));
var_dump(urlCheck('Just Text.'));
var_dump(urlCheck('http://a.com'));
var_dump(urlCheck('http://www.domain-.com'));
var_dump(urlCheck(''));
echo "</pre>";
