<?php
list($n, $k) = ints();
$a = ints();
// 全ての丸太をx未満の長さにするのに必要な回数がk以下となる時のxの最小値を求める
$ok = max($a);
$ng = 0;
while (abs($ok - $ng) > 1) {
    $mid = intdiv($ok + $ng, 2);
    $cnt = 0;
    for ($i = 0; $i < $n; ++$i)
        $cnt += intdiv($a[$i], $mid) + min(1, $a[$i] % $mid) - 1;
    if ($cnt <= $k) $ok = $mid;
    else $ng = $mid;
}
echo $ok;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
