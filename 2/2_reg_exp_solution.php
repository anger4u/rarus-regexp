<?php

declare(strict_types=1);

/**
 * Функция проверки наличия фигурных скобок у GUID через регулярные выражения
 *
 * @param string $foo
 *
 * @return bool
 */
function guidCheckReg(string $foo) {

    $regBrace = '/^\{{1}[[:xdigit:]]{8}-[[:xdigit:]]{4}-[[:xdigit:]]{4}-[[:xdigit:]]{4}-[[:xdigit:]]{12}\}{1}$/u';
    $regNoBrace = '/^[[:xdigit:]]{8}-[[:xdigit:]]{4}-[[:xdigit:]]{4}-[[:xdigit:]]{4}-[[:xdigit:]]{12}$/u';

    if (preg_match($regBrace, $foo)) {
        $result = true;
    } else if (preg_match($regNoBrace, $foo)) {
        $result = false;
    } else {
        throw new InvalidArgumentException('GUID введён неверно!');
    }

    return($result);
}

echo "<pre>";
var_dump(guidCheckReg('{e02fa0e4-01ad-090A-c130-0d05a0008ba0}'));
var_dump(guidCheckReg('e02fd0e4-00fd-090A-ca30-0d00a0038ba0'));
var_dump(guidCheckReg('02fa0e4-01ad-090A-c130-0d05a0008ba0}'));
var_dump(guidCheckReg('e02fd0e400fd090Aca300d00a0038ba0'));
echo "</pre>";