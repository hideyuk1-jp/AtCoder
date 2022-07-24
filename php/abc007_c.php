<?php

define('WALL', '#');
define('ROAD', '.');
list($h, $w) = ints();
list($sy, $sx) = ints();
$start = ($sy - 1) * $w + $sx - 1;
list($gy, $gx) = ints();
$goal = ($gy - 1) * $w + $gx - 1;
for ($i  = 0; $i < $h; $i++) {
    list($c[]) = strs();
}
$g = array_fill(0, $h * $w, []);
for ($i  = 0; $i < $h * $w; $i++) {
    $l = intdiv($i, $w);
    $m = $i % $w;

    if ($c[$l][$m] === WALL) {
        continue;
    }

    if ($m < $w - 1 && $c[$l][$m + 1] === ROAD) {
        $g[$i][] = $i + 1;
        $g[$i + 1][] = $i;
    }

    if ($l < $h - 1 && $c[$l + 1][$m] === ROAD) {
        $g[$i][] = $i + $w;
        $g[$i + $w][] = $i;
    }
}

$n = $h * $w;
// BFS（幅優先探索）：最短経路アルゴリズムとして活用
$q = new SplQueue(); // キューを用意
$dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

$dist[$start] = 0; // 頂点0からの距離格納配列
$q->enqueue($start); // キューに0を追加

while (!$q->isEmpty()) {
    $v = $q->dequeue();

    foreach ($g[$v] as $next_v) {
        if ($dist[$next_v] !== -1) {
            continue;
        } // 発見済み

        $dist[$next_v] = $dist[$v] + 1;
        $q->enqueue($next_v);
    }
}
echo $dist[$goal] . PHP_EOL;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
