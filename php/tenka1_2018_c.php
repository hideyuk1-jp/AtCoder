<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a[]) = ints();
}
$_a = $a;
rsort($a);
sort($_a);
for ($i = 0; $i < intdiv($n, 2); ++$i) {
    if ($i % 2 === 0) {
        $r[] = $_a[$i];
        $l[] = $a[$i];
    } else {
        $r[] = $a[$i];
        $l[] = $_a[$i];
    }
}
if ($n % 2) {
    if (abs($r[$i - 1] - $a[$i]) > abs($l[$i - 1] - $a[$i])) {
        $r[] = $a[$i];
    } else {
        $l[] = $a[$i];
    }
}
$aa = array_merge(array_reverse($l), $r);
$ans = 0;
for ($i = 0; $i < $n - 1; ++$i) {
    $ans += abs($aa[$i + 1] - $aa[$i]);
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
