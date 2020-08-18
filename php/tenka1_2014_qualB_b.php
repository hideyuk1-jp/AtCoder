<?php
const MOD = 10 ** 9 + 7;
list($n) = ints();
list($s) = strs();
$l = strlen($s);
for ($i = 0; $i < $n; ++$i) {
    list($t) = strs();
    for ($j = 0; $j < $l - strlen($t) + 1; ++$j) {
        if ($t === substr($s, $j, strlen($t))) $c[$j][] = strlen($t);
    }
}
echo dfs(), PHP_EOL;
function dfs($d = 0)
{
    global $l, $c, $memo;
    if (isset($memo[$d])) return $memo[$d];
    if ($d === $l) return 1;
    $res = 0;
    if (isset($c[$d])) {
        foreach ($c[$d] as $len) {
            $res += dfs($d + $len);
            $res %= MOD;
        }
    }
    $memo[$d] = $res;
    return $memo[$d];
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
