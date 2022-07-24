<?php

// グラフ：頂点と辺の総数のあと改行して改行区切りの辺の集合
fscanf(STDIN, '%d', $n);
for ($i  = 0; $i < $n - 1; $i++) {
    fscanf(STDIN, '%d %d %d', $u, $v, $w);
    $u--;
    $v--;
    $g[$u][] = [$v, $w];
    $g[$v][] = [$u, $w]; // 無向グラフの場合
}

// BFS（幅優先探索）：最短経路アルゴリズムとして活用
$q = new SplQueue(); // キューを用意
$dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

$dist[0] = 0; // 頂点0からの距離格納配列
$q->enqueue(0); // キューに0を追加

while (!$q->isEmpty()) {
    $v = $q->dequeue();

    foreach ($g[$v] as $next_v) {
        if ($dist[$next_v[0]] !== -1) {
            continue;
        } // 発見済み

        $dist[$next_v[0]] = $dist[$v] + $next_v[1];
        $q->enqueue($next_v[0]);
    }
}
foreach ($dist as $i => $v) {
    if ($dist[$i] % 2 === 0) {
        echo(0) . PHP_EOL;
    } else {
        echo(1) . PHP_EOL;
    }
}

exit();

fscanf(STDIN, '%d %d', $n, $k);

$ans = 0;
for ($i = 1; $i <= $n; $i++) {
    $p = $i;
    $j = 0;
    while ($p <= $k - 1) {
        $p *= 2;
        $j++;
    }
    $ans += 1 / $n * 1 / (2 ** $j);
}
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%s', $s);

$a = (int)($s[0] . $s[1]);
$b = (int)($s[2] . $s[3]);

if ($a >= 1 && $a <= 12 && $b >=1 && $b <= 12) {
    $ans = 'AMBIGUOUS';
} elseif ($a >= 1 && $a <= 12) {
    $ans = 'MMYY';
} elseif ($b >=1 && $b <= 12) {
    $ans = 'YYMM';
} else {
    $ans = 'NA';
}
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d %d', $n, $k);
fscanf(STDIN, '%s', $s);

$ans = '';
for ($i = 0; $i < $n; $i++) {
    if ($i === $k - 1) {
        $ans = $ans . strtolower($s[$i]);
    } else {
        $ans = $ans . $s[$i];
    }
}
echo $ans . PHP_EOL;
