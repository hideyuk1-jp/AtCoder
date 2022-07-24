<?php

list($n, $m, $v, $p) = ints();
$a = ints();
rsort($a);
$ok = $p - 1;
$ng = $n;
while (abs($ok - $ng) > 1) {
    $mid = intdiv($ok + $ng, 2);
    // mid に m 人全員が投票しても p 番目のスコアを超えない場合は採用される可能性なし
    if ($a[$mid] + $m < $a[$p - 1]) {
        $ng = $mid;
        continue;
    }
    // mid の採用の可能性に影響しない投票数を数える
    $cnt = 0;
    for ($i = 0; $i < $n; ++$i) {
        if ($i === $mid) {
            continue;
        }
        // 大きい順に p-1 個については全力投票してもok
        if ($i < $p - 1) {
            $cnt += $m;
        }
        // 残りについては a[mid]+m を超えない範囲の人数が投票してもok
        else {
            $cnt += min($m, $a[$mid] + $m - $a[$i]);
        }
    }
    if ($cnt >= $m * ($v - 1)) {
        $ok = $mid;
    } else {
        $ng = $mid;
    }
}
echo $ok + 1;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
