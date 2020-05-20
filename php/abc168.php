<?php
// D
fscanf(STDIN, '%d %d', $n, $m);
for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d', $a, $b);
    $a--;
    $b--;
    $g[$a][] = $b;
    $g[$b][] = $a; // 無向グラフの場合
}

// BFS（幅優先探索）：最短経路アルゴリズムとして活用
$q = new SplQueue(); // キューを用意
$dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

$dist[0] = 0; // 頂点0からの距離格納配列
$q->enqueue(0); // キューに0を追加

while (!$q->isEmpty()) {
    $v = $q->dequeue();

    foreach ($g[$v] as $next_v) {
        if ($dist[$next_v] !== -1) continue; // 発見済み

        $dist[$next_v] = $dist[$v] + 1;
        $arrow[$next_v] = $v;
        $q->enqueue($next_v);
    }
}

echo 'Yes' . PHP_EOL;
for ($i = 1; $i < $n; $i++) {
    echo ($arrow[$i] + 1) . PHP_EOL;
}

exit;

// C
fscanf(STDIN, '%d %d %d %d', $a, $b, $h, $m);
$y = $m / 60;
$x = ($h + $y) / 12;
$rad = deg2rad(($x - $y) * 360);
$ans = sqrt($a ** 2 + $b ** 2 - 2 * $a * $b * cos($rad));
echo $ans;

exit;

// B
fscanf(STDIN, '%d', $k);
fscanf(STDIN, '%s', $s);
if (strlen($s) > $k) {
    $ans = substr($s, 0, $k) . '...';
} else {
    $ans = $s;
}
echo $ans;

exit;

// A
fscanf(STDIN, '%d', $n);
switch ($n % 10) {
    case 2:
    case 4:
    case 5:
    case 7:
    case 9:
        $ans = 'hon';
        break;
    case 0:
    case 1:
    case 6:
    case 8:
        $ans = 'pon';
        break;
    case 3:
        $ans = 'bon';
        break;
}
echo $ans;
