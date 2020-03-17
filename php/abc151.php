<?php
define('WALL', '#');
define('ROAD', '.');
fscanf(STDIN, '%d %d', $h, $w);
for ($i  = 0; $i < $h; $i++) {
    $s[] = trim(fgets(STDIN));
}
$g = array_fill(0, $h * $w, []);
for ($i  = 0; $i < $h * $w; $i++) {
    $l = intval(floor($i / $w));
    $m = $i % $w;

    if ($s[$l][$m] === WALL) continue;

    if ($m < $w - 1 && $s[$l][$m + 1] === ROAD) {
        $g[$i][] = $i + 1;
        $g[$i + 1][] = $i;
    }

    if ($l < $h - 1 && $s[$l + 1][$m] === ROAD) {
        $g[$i][] = $i + $w;
        $g[$i + $w][] = $i;
    }
}
$max_dist = -1;
for ($i = 0; $i < $h * $w; $i++) {
    // BFS（幅優先探索）：最短経路アルゴリズムとして活用
    $q = new SplQueue(); // キューを用意
    $dist = array_fill(0, $h * $w, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

    $dist[$i] = 0; // 頂点iからの距離格納配列
    $q->enqueue($i); // キューにiを追加

    while (!$q->isEmpty()) {
        $v = $q->dequeue();

        foreach ($g[$v] as $next_v) {
            if ($dist[$next_v] !== -1) continue; // 発見済み

            $dist[$next_v] = $dist[$v] + 1;
            $q->enqueue($next_v);
        }
    }

    foreach ($dist as $v) {
        $max_dist = max($v, $max_dist);
    }
}
echo $max_dist . PHP_EOL;

exit;

fscanf(STDIN, '%d %d', $n, $m);
$arr = array_fill(1, $n, [false, 0]);
for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %s', $p, $s);
    if ($arr[$p][0]) continue;

    if ($s === 'AC') {
        $arr[$p][0] = true;
    } elseif ($s === 'WA') {
        $arr[$p][1]++;
    }
}
$ans = [0, 0];
for ($i = 1; $i <= $n; $i++) {
    if ($arr[$i][0]) {
        $ans[0]++;
        $ans[1] += $arr[$i][1];
    }
}
echo implode(' ', $ans);

exit;

fscanf(STDIN, '%d %d %d', $n, $k, $m);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$score = 0;
for ($i = 0; $i < $n - 1; $i++) {
    $score += $a[$i];
}
$ans = max($n * $m - $score, 0);
if ($ans > $k) $ans = -1;
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%s', $c);
for ($i = 0; $i < 26; $i++) { // アルファベットの数(=26)だけ処理ループ
    if (chr(97 + $i) === $c) break;
}
$ans = chr(97 + $i + 1);
echo $ans . PHP_EOL;
