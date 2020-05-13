<?php
// D
fscanf(STDIN, '%d', $x);
$a = 0;
while (true) {
    $a5 = $a ** 5;
    $arr[$a] = $a5;
    foreach ($arr as $i => $v) {
        if ($a5 + $v === $x) {
            $b = -$i;
            break 2;
        } elseif ($a5 - $v === $x) {
            $b = $i;
            break 2;
        }
    }
    $a++;
}
echo $a . ' ' . $b;

exit;

// C
fscanf(STDIN, '%d %d', $n, $m);
$h = array_map('intval', explode(' ', trim(fgets(STDIN))));
$g = array_fill(0, $n, 1);
for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d', $a, $b);
    $a--;
    $b--;
    if ($h[$a] > $h[$b]) {
        $g[$a] *= 1;
        $g[$b] *= 0;
    } elseif ($h[$a] === $h[$b]) {
        $g[$a] *= 0;
        $g[$b] *= 0;
    } else {
        $g[$a] *= 0;
        $g[$b] *= 1;
    }
}
echo array_sum($g);

exit;

// B
fscanf(STDIN, '%d %d', $n, $k);
$cnt = 0;
for ($i  = 0; $i < $k; $i++) {
    fscanf(STDIN, '%d', $d[]);
    $a = array_map('intval', explode(' ', trim(fgets(STDIN))));
    foreach ($a as $aa) {
        if (!isset($have[$aa])) {
            $cnt++;
            $have[$aa] = true;
        }
    }
}
$ans = $n - $cnt;
echo $ans;

exit;

// A
fscanf(STDIN, '%s', $s);
$ans = $s === 'ABC' ? 'ARC' : 'ABC';
echo $ans;
