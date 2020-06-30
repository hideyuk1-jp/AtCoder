<?php
list($h, $w) = ints();
for ($i = 0; $i < $h; ++$i) list($s[]) = strs();
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        if ($s[$i][$j] === '#') {
            $d[$i][$j] = 0;
            continue;
        }
        if ($i > 0 && $s[$i - 1][$j] === '#') $d[$i - 1][$j] = 0;
        if ($j > 0 && $s[$i][$j - 1] === '#') $d[$i][$j - 1] = 0;
        $d[$i][$j] = min(INF, ($d[$i - 1][$j] ?? INF) + 1, ($d[$i][$j - 1] ?? INF) + 1);
    }
}
// var_dump($d);
for ($i = $h - 1; $i >= 0; --$i) {
    for ($j = $w - 1; $j >= 0; --$j) {
        if ($s[$i][$j] === '#') continue;
        $d[$i][$j] = min($d[$i][$j], ($d[$i + 1][$j] ?? INF) + 1, ($d[$i][$j + 1] ?? INF) + 1);
    }
}
// var_dump($d);
$max = 0;
for ($i = 0; $i < $h; ++$i) $max = max($max, max($d[$i]));
echo $max;
function strs(): array
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints(): array
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
