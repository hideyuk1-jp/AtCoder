<?php

list($a, $b) = ints();
echo uruu($b) - uruu($a - 1);
echo PHP_EOL;
// 西暦1年からn年までの閏年の数を返す
function uruu($n)
{
    $res = intdiv($n, 4);
    $res -= intdiv($n, 100);
    $res += intdiv($n, 400);
    return $res;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
