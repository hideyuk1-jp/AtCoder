<?php
// 二分探索で
[$N] = ints();
$ok = 1;
$ng = $N + 1;
while (abs($ok - $ng) > 1) {
    $mid = intdiv($ok + $ng, 2);
    if ($mid * ($mid + 1) <= 2 * ($N + 1)) $ok = $mid;
    else $ng = $mid;
}
echo $N - $ok + 1;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
