<?php

$di = [-1, 0, 1, 0];
$dj = [0, 1, 0, -1];
list($h, $w) = ints();
for ($i = 0; $i < $h; ++$i) {
    list($c[]) = strs();
    for ($j = 0; $j < $w; ++$j) {
        if ($c[$i][$j] === 's') {
            $si = $i;
            $sj = $j;
        }
        if ($c[$i][$j] === 'g') {
            $gi = $i;
            $gj = $j;
        }
    }
}
bfs($si, $sj);
echo $score[$gi][$gj] <= 2 ? 'YES' : 'NO';
echo PHP_EOL;
function bfs($si, $sj)
{
    global $h, $w, $di, $dj, $c, $score;
    $score = array_fill(0, $h, array_fill(0, $w, INF));
    // dequeがPHPにないのでqueue2つで代用
    $q_top = new SplQueue(); // 先頭（壁以外の場合に追加）
    $q_end = new SplQueue(); // 末尾（壁の場合に追加）
    $q_top->enqueue([$si, $sj]);
    $score[$si][$sj] = 0;
    while (!$q_top->isEmpty() || !$q_end->isEmpty()) {
        list($i, $j) = !$q_top->isEmpty() ? $q_top->dequeue() : $q_end->dequeue();
        for ($dir = 0; $dir < 4; ++$dir) {
            $ni = $i + $di[$dir];
            $nj = $j + $dj[$dir];
            // 範囲外であればコンテニュー
            if ($ni < 0 || $ni > $h - 1 || $nj < 0 || $nj > $w - 1) {
                continue;
            }
            if ($c[$ni][$nj] === '#') { // 壁
                if ($score[$ni][$nj] <= $score[$i][$j] + 1) {
                    continue;
                }
                if ($score[$i][$j] <= 1) {
                    // 末尾に追加
                    $q_end->enqueue([$ni, $nj]);
                    $score[$ni][$nj] = $score[$i][$j] + 1;
                } else {
                    continue;
                }
            } else { // 壁以外
                if ($score[$ni][$nj] <= $score[$i][$j]) {
                    continue;
                }
                // 先頭に追加
                $q_top->enqueue([$ni, $nj]);
                $score[$ni][$nj] = $score[$i][$j];
            }
        }
    }
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
