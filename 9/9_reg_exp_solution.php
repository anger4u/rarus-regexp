<?php

declare(strict_types=1);

/**
 * Проверка, надежно ли составлен пароль через регулярное выражение
 *
 *
 * Пароль считается надежным, если он состоит из 8 или более символов.
 * Где символом может быть английская буква, цифра и знак подчеркивания.
 * Пароль должен содержать хотя бы одну заглавную букву, одну маленькую букву и одну цифру.
 *
 * @param string $foo
 *
 * @return bool
 */
function passCheckReg(string $foo) {
    if (!empty($foo)) {
        $regExp = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-z_]{8,}$/u';
        preg_match($regExp, $foo) ? $result = true : $result = false;
    } else {
        throw new InvalidArgumentException('Ошибка, пустая строка!');
    }

    return ($result);
}

echo "<pre>";
var_dump(passCheckReg('C00l_Pass'));
var_dump(passCheckReg('SupperPas1'));
var_dump(passCheckReg('Cool_pass'));
var_dump(passCheckReg('C00l '));
var_dump(passCheckReg(''));
echo "</pre>";