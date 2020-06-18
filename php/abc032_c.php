<?php
list($n, $k) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($s[$i]) = ints();
    if ($s[$i] === 0) {
        echo $n . PHP_EOL;
        exit;
    }
}
// しゃくとり
$max = 0;
$j = 0;
for ($i = 0; $i < $n; ++$i) {
    $j = max($i, $j);
    if ($s[$i] > $k) continue;
    if ($j === $i) $p = $s[$i];
    else $p /= $s[$i - 1];
    while ($j < $n - 1 && $p * $s[$j + 1] <= $k) {
        $p *= $s[$j + 1];
        $j++;
    }
    $max = max($max, $j - $i + 1);
    if ($j === $n - 1) break;
}
echo $max . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
