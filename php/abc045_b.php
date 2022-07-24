<?php

foreach (['a', 'b', 'c'] as $v) {
    list($s[$v]) = strs();
    $n[$v] = strlen($s[$v]);
    $i[$v] = 0;
}
$next = 'a';
while (true) {
    if ($i[$next] === $n[$next]) {
        break;
    }
    ++$i[$next];
    $next = $s[$next][$i[$next] - 1];
}
echo strtoupper($next);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
