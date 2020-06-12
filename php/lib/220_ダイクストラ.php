<?php
// abc079_d
list($h, $w) = ints();
for ($i = 0; $i < 10; ++$i)
    foreach (ints() as $j => $v) $cost[$i][$j] = $v;
for ($i = 0; $i < 10; ++$i) $d[$i] = dijkstra($i, 10);
$ans = 0;
for ($i = 0; $i < $h; ++$i)
    foreach (ints() as $v) $ans += $v !== -1 ? $d[$v][1] : 0;
echo $ans;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

// ノードsからの各ノードへの最短距離
function dijkstra($s, $n)
{
    global $cost, $root;
    $d = array_fill(0, $n, INF);
    $d[$s] = 0;
    $root[$s] = array_fill(0, $n, [$s]); // 各ノードまでの最短経路を格納
    $used = array_fill(0, $n, false);
    while (true) {
        $v = -1;
        // 残りのノードのうち最短で到達出来るノードを選択
        for ($i = 0; $i < $n; ++$i) {
            if (!$used[$i] && $v === -1) $v = $i;
            elseif (!$used[$i] && $d[$i] < $d[$v]) $v = $i;
        }
        if ($v === -1) break;
        for ($i = 0; $i < $n; ++$i) {
            if ($d[$v] + $cost[$v][$i] < $d[$i]) {
                $d[$i] = $d[$v] + $cost[$v][$i];
                $root[$s][$i] = array_merge($root[$s][$v], [$i]);
            }
        }
        $used[$v] = true;
    }
    return $d;
}
