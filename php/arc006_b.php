<?php

list($n, $l) = ints();
for ($i = 0; $i < $l; ++$i) {
    $s[$l - 1 - $i] = substr(fgets(STDIN), 0, 2 * $n - 1);
}
$y = fgets(STDIN);
$now = strpos($y, 'o');
for ($i = 0; $i < $l; ++$i) {
    if ($now > 1 && $s[$i][$now - 1] === '-') {
        $now -= 2;
    } elseif ($now < (2 * $n - 1) - 2 && $s[$i][$now + 1] === '-') {
        $now += 2;
    }
}
echo(intdiv($now, 2) + 1) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
