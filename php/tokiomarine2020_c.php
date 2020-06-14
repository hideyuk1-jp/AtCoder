<?php
list($n, $k) = ints();
$a = ints();
while ($k > 0) {
    $_a = array_fill(0, $n, 0);
    for ($i = 0; $i < $n; ++$i) {
        $l = max(0, $i - $a[$i]);
        $r = min($n - 1, $i + $a[$i]);
        $_a[$l]++;
        if ($r + 1 < $n) $_a[$r + 1]--;
    }
    for ($i = 0; $i < $n - 1; ++$i) $_a[$i + 1] += $_a[$i];
    if ($a === $_a) break;
    $a = $_a;
    $k--;
}
echo implode(' ', $_a);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
