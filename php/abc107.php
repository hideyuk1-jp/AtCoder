<?php

// C
fscanf(STDIN, '%d %d', $n, $k);
$x = array_map('intval', explode(' ', trim(fgets(STDIN))));
if ($x[0] > 0) {
    echo $x[$k - 1];
    exit;
}
if ($x[$n - 1] < 0) {
    echo -$x[$n - $k];
    exit;
}
$l = $r = [0];
for ($i = 0; $i < $n; $i++) {
    if ($x[$i] < 0) {
        $l[] = -$x[$i];
    } elseif ($x[$i] > 0) {
        $r[] = $x[$i];
    } else {
        $k--;
    }
}
$ans = 10 ** 10;
sort($l);
for ($i = 0; $i <= $k; $i++) {
    if (!isset($l[$i]) || !isset($r[$k - $i])) {
        continue;
    }
    $d = [$l[$i], $r[$k - $i]];
    sort($d);
    $ans = min($ans, $d[0] * 2 + $d[1]);
}
echo $ans;

exit;

// B
fscanf(STDIN, '%d %d', $h, $w);
for ($i = 0; $i < $h; $i++) {
    $a[] = trim(fgets(STDIN));
}
$gi = $gj = [];
for ($i = 0; $i < $h; $i++) {
    for ($j = 0; $j < $w; $j++) {
        if ($a[$i][$j] === '#') {
            $gi[] = $i;
            $gj[] = $j;
        }
    }
}
$gi = array_unique($gi);
$gj = array_unique($gj);
sort($gi);
sort($gj);
foreach ($gi as $i) {
    $ga = [];
    foreach ($gj as $j) {
        echo $a[$i][$j];
    }
    echo PHP_EOL;
}

exit;

// A
fscanf(STDIN, '%d %d', $n, $i);
echo $n - $i + 1;
