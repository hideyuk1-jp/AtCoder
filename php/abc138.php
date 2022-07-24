<?php

fscanf(STDIN, '%s', $s);
fscanf(STDIN, '%s', $t);

$n = strlen($t);
$m = 0;
$pos = 0;
for ($i = 0; $i < $n; $i++) {
    $pos_tmp = strpos($s, $t[$i], $pos);
    if ($pos_tmp) {
        $pos = $pos_tmp;
    } else {
        $pos = strpos($s, $t[$i], 0);
        if ($pos === false || $m === 10 ** 100) {
            echo(-1) . PHP_EOL;
            exit();
        }
        $m++;
    }
}
$ans = $pos + 1 + strlen($s) * $m;
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d %d', $n, $q);
for ($i  = 0; $i < $n - 1; $i++) {
    fscanf(STDIN, '%d %d', $a, $b);
    $a--;
    $b--;
    $g[$a][] = $b;
}
$r = array_fill(0, $n, 0);
for ($i  = 0; $i < $q; $i++) {
    fscanf(STDIN, '%d %d', $p, $x);
    $r[$p - 1] += $x;
}
$point = array_fill(0, $n, 0);
dfs($g, 0, 0, $r, $point);
$ans = implode(' ', $point);
echo $ans . PHP_EOL;

function dfs($g, $v = 0, $x = 0, $r, &$point)
{
    if (isset($r[$v])) {
        $x += $r[$v];
    }
    $point[$v] += $x;

    if (!isset($g[$v])) {
        return;
    }
    foreach ($g[$v] as $next_v) {
        dfs($g, $next_v, $x, $r, $point);
    }
}

exit();

fscanf(STDIN, '%d', $n);
$v = array_map('intval', explode(' ', trim(fgets(STDIN))));
$q = new SplPriorityQueue();
for ($i = 0; $i < $n; $i++) {
    $q->insert($v[$i], -$v[$i]);
}
while ($q->count() > 1) {
    $x = $q->extract();
    $y = $q->extract();
    $z = ($x + $y) / 2;
    $q->insert($z, -$z);
}
$ans = $q->extract();
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));

$ans = 0;
for ($i = 0; $i < $n; $i++) {
    $ans += 1 / $a[$i];
}
$ans = 1 / $ans;
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d', $a);
fscanf(STDIN, '%s', $s);
if ($a >= 3200) {
    $ans = $s;
} else {
    $ans = 'red';
}
echo $ans . PHP_EOL;

exit();
