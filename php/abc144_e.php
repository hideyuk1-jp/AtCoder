<?php
list($n, $k) = ints();
$a = ints();
$f = ints();
sort($a);
rsort($f);
$max = 0;
for ($i = 0; $i < $n; ++$i)
    $max = max($max, $a[$i] * $f[$i]);
// 二分探索
$ok = $max;
$ng = -1;
while (abs($ok - $ng) > 1) {
    $mid = intdiv($ok + $ng, 2);
    // 各完食時間を mid 以下にするためには i を最低何回修行させるかカウント
    $cnt = 0;
    for ($i = 0; $i < $n; ++$i) {
        // a * f <= mid, a <= mid / f
        $cnt += max(0, $a[$i] - intdiv($mid, $f[$i]));
    }
    if ($cnt <= $k) $ok = $mid;
    else $ng = $mid;
}
echo $ok;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
