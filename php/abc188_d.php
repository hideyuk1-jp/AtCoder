<?php
[$N, $C] = ints();
for ($i = 0; $i < $N; ++$i) {
    [$a, $b, $c] = ints();
    if (isset($sum[$a])) $sum[$a] += $c;
    else $sum[$a] = $c;
    if (isset($sum[$b + 1])) $sum[$b + 1] -= $c;
    else $sum[$b + 1] = -$c;
}
ksort($sum);
$cnt = $cost = 0;
foreach ($sum as $t => $v) {
    if ($cnt === 0) {
        $cnt++;
        $pt = $t;
        $pv = $v;
        continue;
    }
    $cost += min($pv, $C) * ($t - $pt);
    $sum[$t] += $sum[$pt];
    $pt = $t;
    $pv = $sum[$t];
}
echo $cost;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
