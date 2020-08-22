<?php
list($h, $w) = ints();
list($si, $sj) = ints();
list($gi, $gj) = ints();
for ($i = 0; $i < $h; ++$i) list($c[]) = strs();
$score = bfs($h, $w, $c, $si - 1, $sj - 1);
echo $score[$gi - 1][$gj - 1] !== INF ? $score[$gi - 1][$gj - 1] : -1;
function bfs($h, $w, $c, $si, $sj)
{
    $score = array_fill(0, $h, array_fill(0, $w, INF));
    // dequeがPHPにないのでqueue2つで代用
    $q_top = new SplQueue(); // 先頭（通常移動）
    $q_end = new SplQueue(); // 末尾（ワープ移動）
    $q_top->enqueue([$si, $sj]);
    $score[$si][$sj] = 0;
    while (!$q_top->isEmpty() || !$q_end->isEmpty()) {
        list($i, $j) = !$q_top->isEmpty() ? $q_top->dequeue() : $q_end->dequeue();
        if (isset($visited[$i][$j])) continue;
        for ($di = -2; $di <= 2; ++$di) {
            for ($dj = -2; $dj <= 2; ++$dj) {
                if ($di === 0 && $dj === 0) continue;
                $ni = $i + $di;
                $nj = $j + $dj;
                // 範囲外であればコンテニュー
                if ($ni < 0 || $ni > $h - 1 || $nj < 0 || $nj > $w - 1) continue;
                // 壁であればコンティニュー
                if ($c[$ni][$nj] === '#') continue;
                $warpFrag = (abs($di) + abs($dj)) > 1;
                if ($warpFrag) {
                    if ($score[$ni][$nj] <= $score[$i][$j] + 1) continue;
                    // 末尾に追加
                    $q_end->enqueue([$ni, $nj]);
                    $score[$ni][$nj] = $score[$i][$j] + 1;
                } else {
                    if ($score[$ni][$nj] <= $score[$i][$j]) continue;
                    // 先頭に追加
                    $q_top->enqueue([$ni, $nj]);
                    $score[$ni][$nj] = $score[$i][$j];
                }
            }
        }
        $visited[$i][$j] = true;
    }
    return $score;
}

function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
