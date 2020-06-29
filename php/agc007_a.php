<?php
define('ROAD', '#');
define('WALL', '.');
list($h, $w) = ints();
for ($i = 0; $i < $h; ++$i) list($a[]) = strs();
$c = 0;
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        if ($a[$i][$j] === WALL) continue;
        if ($i < $h - 1 && $a[$i + 1][$j] === ROAD) ++$c;
        if ($j < $w - 1 && $a[$i][$j + 1] === ROAD) ++$c;
    }
}
echo $c === $h - 1 + $w - 1 ? 'Possible' : 'Impossible';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
