<?php

declare(strict_types=1);

function emailCheck(string $foo) {

    if (!empty($foo)) {
        $regExp = '/^([A-z0-9\+\.\_\-]+\.)?([A-z0-9]+)+@[A-z0-9-]+[A-z0-9]+\.([A-z]{1,6}\.)?[A-z]{2,6}$/u';
        preg_match($regExp, $foo) ? $result = true : $result = false;
    } else {
        throw new InvalidArgumentException('Ошибка, пустая строка!');
    }

    return ($result);
}

echo "<pre>";
var_dump(emailCheck('mail@mail.ru'));
var_dump(emailCheck('valid@megapochta.com'));
var_dump(emailCheck('aa@aa.info'));
var_dump(emailCheck('bug@@@com.ru'));
var_dump(emailCheck('@val.ru'));
var_dump(emailCheck('Just Text2'));
var_dump(emailCheck('val@val'));
var_dump(emailCheck('val@val.a.a.a.a'));
var_dump(emailCheck('12323123@111[]][] '));
var_dump(emailCheck(''));
echo "</pre>";
//
//$email = ''; //входящая строка, в которой может быть все, что угодно, а должна быть почта
//if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email))
//{
//    //все ОК, email правильный
//}
//else
//{
//    //проверка email на правильность НЕ пройдена
//}