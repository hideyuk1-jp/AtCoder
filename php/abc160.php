<?php
// コンテスト参加 EまでAC
// F
fscanf(STDIN, '%d', $n);
for ($i  = 0; $i < $n - 1; $i++) {
    fscanf(STDIN, '%d %d', $a, $b);
    $g[$a][] = $b;
    $g[$b][] = $a; // 無向グラフの場合
}

for ($i = 1; $i <= $n; $i++) {
    dfs($i);
    var_dump($cnt);
}

function dfs($v = 0)
{
    global $g, $seen, $cnt;
    $seen[$v] = true;

    if (is_null($g[$v])) return;

    // 子の頂点の数
    $cnt[$v] = count($g[$v]) - 1;

    foreach ($g[$v] as $to) {
        if ($seen[$to]) continue;
        dfs($to);
    }
}


exit;

// E
fscanf(STDIN, '%d %d %d %d %d', $x, $y, $a, $b, $c);
$p = array_map('intval', explode(' ', trim(fgets(STDIN))));
$q = array_map('intval', explode(' ', trim(fgets(STDIN))));
$r = array_map('intval', explode(' ', trim(fgets(STDIN))));

rsort($p);
rsort($q);

$pp = array_splice($p, 0, $x);
$qq = array_splice($q, 0, $y);

$arr = array_merge($pp, $qq, $r);

rsort($arr);
$arr = array_splice($arr, 0, $x + $y);

$ans = array_sum($arr);
echo $ans;

exit;

// D
fscanf(STDIN, '%d %d %d', $n, $x, $y);
for ($i  = 0; $i < $n - 1; $i++) {
    $g[$i][] = $i + 1;
    $g[$i + 1][] = $i; // 無向グラフの場合
}
$x--;
$y--;
$g[$x][] = $y;
$g[$y][] = $x; // 無向グラフの場合

for ($i = 0; $i < $n - 1; $i++) {
    $dist = bfs($i);
    for ($j = $i + 1; $j < $n; $j++) {
        if (isset($ans[$dist[$j]])) {
            $ans[$dist[$j]]++;
        } else {
            $ans[$dist[$j]] = 1;
        }
    }
}
for ($i = 1; $i < $n; $i++) {
    echo ($ans[$i] ?? 0) . PHP_EOL;
}

function bfs($x)
{
    global $g, $n;
    // BFS（幅優先探索）：最短経路アルゴリズムとして活用
    $q = new SplQueue(); // キューを用意
    $dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

    $dist[$x] = 0; // 頂点0からの距離格納配列
    $q->enqueue($x); // キューに0を追加

    while (!$q->isEmpty()) {
        $v = $q->dequeue();

        foreach ($g[$v] as $next_v) {
            if ($dist[$next_v] !== -1) continue; // 発見済み

            $dist[$next_v] = $dist[$v] + 1;
            $q->enqueue($next_v);
        }
    }
    return $dist;
}


exit;

// C
fscanf(STDIN, '%d %d', $k, $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$max = 0;
for ($i = 0; $i < $n; $i++) {
    if ($i !== 0) {
        $max = max($a[$i] - $a[$i - 1], $max);
    } else {
        $max = max($k + $a[$i] - $a[$n - 1], $max);
    }
}
echo $k - $max;

exit;

// B
fscanf(STDIN, '%d', $x);
$ans = 0;
$ans += intdiv($x, 500) * 1000;
$x %= 500;
$ans += intdiv($x, 5) * 5;
echo $ans;

exit;

// A
fscanf(STDIN, '%s', $s);
$ans = 'No';
if ($s[2] === $s[3] && $s[4] === $s[5]) {
    $ans = 'Yes';
}
echo $ans;
