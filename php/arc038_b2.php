<?php
define('ROAD', '.');
define('WALL', '#');
list($h, $w) = ints();
for ($i = 0; $i < $h; ++$i) list($a[]) = strs();
for ($i = $h - 1; $i >= 0; --$i) {
    for ($j = $w - 1; $j >= 0; --$j) {
        if ($a[$i][$j] === WALL) continue;
        $tmp = 'LOSE';
        if (($a[$i + 1][$j] ?? '') === ROAD && $memo[$i + 1][$j] === 'LOSE') $tmp = 'WIN';
        if (($a[$i][$j + 1] ?? '') === ROAD && $memo[$i][$j + 1] === 'LOSE') $tmp = 'WIN';
        if (($a[$i + 1][$j + 1] ?? '') === ROAD && $memo[$i + 1][$j + 1] === 'LOSE') $tmp = 'WIN';
        $memo[$i][$j] = $tmp;
    }
}
echo $memo[0][0] === 'WIN' ? 'First' : 'Second';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
