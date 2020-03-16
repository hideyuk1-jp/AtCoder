<?php
fscanf(STDIN, '%d', $n);
for ($i = 0; $i < $n; $i++) $a[$i] = array_map('intval', explode(' ', trim(fgets(STDIN))));

for ($i = 0; $i < $n; $i++) {
    $m = count($a[$i]);
    for ($j = 1; $j < $m; $j++) {
        if ($i + 1 > $a[$i][$j]) list($_i, $_v) = [$a[$i][$j], $i + 1];
        else list($_i, $_v) = [$i + 1, $a[$i][$j]];

        if ($i + 1 > $a[$i][$j - 1]) list($_pi, $_pv) = [$a[$i][$j - 1], $i + 1];
        else list($_pi, $_pv) = [$i + 1, $a[$i][$j - 1]];

        $g[$_pi][$_pv][] = [$_i, $_v];
    }
}
$status;
$path;
if (!isAcyclic($g)) {
    echo '-1' . PHP_EOL;
    exit();
}
$max = 0;
for ($i = 1; $i <= $n; $i++) {
    for ($j = $i + 1; $j <= $n; $j++) {
        $max = max($max, $path[$i][$j]);
    }
}
echo $max . PHP_EOL;

function isAcyclic($g) {
    global $n, $status, $path;

    for ($i = 1; $i <= $n; $i++) {
        for ($j = $i + 1; $j <= $n; $j++) {
            $status[$i][$j] = 'New';
            $path[$i][$j] = 1;
        }
    }
    for ($i = 1; $i <= $n; $i++) {
        for ($j = $i + 1; $j <= $n; $j++) {
            if ($status[$i][$j] === 'New') {
                if (!isAcyclicDfs($g, [$i, $j], 1)) {
                    return false;
                }
            }
        }
    }
    return true;
}

function isAcyclicDfs($g, $v, $p) {
    global $status, $path;
    list($i, $j) = $v;
    $status[$i][$j] = 'Active';
    $path[$i][$j] = max($p, $path[$i][$j]);
    if (!isset($g[$i][$j])) {
        $status[$i][$j] = 'Finished';
        return true;
    }
    foreach ($g[$i][$j] as $nv) {
        list($ni, $nj) = $nv;
        if ($status[$ni][$nj] === 'Active') {
            return false;
        } elseif ($status[$ni][$nj] === 'New') {
            if (!isAcyclicDfs($g, [$ni, $nj], $p + 1)) {
                return false;
            }
        }
    }
    $status[$i][$j] = 'Finished';
    return true;
}

exit();

fscanf(STDIN, '%d', $n);
$ans = (1 + $n - 1) * ($n - 1) / 2;
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d', $n);
$h = array_map('intval', explode(' ', trim(fgets(STDIN))));
$ans = 0;
$cnt = 0;
for ($i = 0; $i < $n - 1; $i++) {
    if ($h[$i + 1] <= $h[$i]) $cnt++;
    else $cnt = 0;
    $ans = max($cnt, $ans);
}
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d %d', $a, $b);
if ($b === 1) {
    echo (0) . PHP_EOL;
    exit();
}
if ($a >= $b) {
    echo (1) . PHP_EOL;
    exit();
}
$ans = 1 + (int)ceil(($b - $a)  / ($a - 1));
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%s', $s);
fscanf(STDIN, '%s', $t);
$ans = 0;
for ($i = 0; $i < 3; $i++) {
    if ($s[$i] === $t[$i]) $ans++;
}
echo $ans . PHP_EOL;