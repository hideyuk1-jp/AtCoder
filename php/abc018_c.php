<?php
list($r, $c, $k) = ints();
for ($i = 0; $i < $r; ++$i) {
    list($s[]) = strs();
    for ($j = 0; $j < $c; ++$j) {
        if ($s[$i][$j] === 'x') setNG($i, $j);
    }
}
$cnt = 0;
for ($i = $k - 1; $i <= $r - $k; ++$i) {
    for ($j = $k - 1; $j <= $c - $k; ++$j) {
        if (!isset($ng[$i][$j])) ++$cnt;
    }
}
echo $cnt . PHP_EOL;
function setNG($x, $y)
{
    global $r, $c, $k, $ng;
    for ($i = max($k - 1, $x - $k + 1); $i <= min($r - $k, $x + $k - 1); ++$i) {
        $d = $k - 1 - abs($i - $x);
        for ($j = max($k - 1, $y - $d); $j <= min($c - $k, $y + $d); ++$j) {
            $ng[$i][$j] = true;
        }
    }
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
