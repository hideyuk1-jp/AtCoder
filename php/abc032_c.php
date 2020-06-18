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
$max = $r = 0;
for ($l = 0; $l < $n; ++$l) {
    $r = max($l, $r); // 左端が右端を追い越さないように
    if ($r === $l) $p = 1;
    else $p /= $s[$l - 1];
    while ($r < $n && $p * $s[$r] <= $k) {
        $p *= $s[$r];
        ++$r;
    }
    $max = max($max, $r - $l);
    if ($r === $n) break;
}
echo $max . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
