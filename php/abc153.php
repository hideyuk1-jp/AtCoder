<?php

// F

// E
fscanf(STDIN, '%d %d', $H, $N);
$q = new SplPriorityQueue();
for ($i  = 0; $i < $N; $i++) {
    fscanf(STDIN, '%d %d', $a, $b);
    if ($a > $H) {
        $a = $H;
    }
    $q->insert([$a, $b], $a/$b);
}
$ans = 0;
$n = 0;
while (true) {
    while (true) {
        $c = $q->extract();
        if ($c[0] > $H) {
            echo 'skip';
            $q->insert([$H, $c[1]], $H/$c[1]);
        } else {
            break;
        }
    }
    var_dump($c);
    if ($H % $c[0] == 0) {
        $ans += $c[1] * $H/$c[0];
        break;
    }
    $ans += $c[1] * floor($H/$c[0]);
    $H = $H % $c[0];
    $q->insert([$H, $c[1]], $H/$c[1]);
}

echo $ans;

exit;
// D
fscanf(STDIN, '%d', $H);
$ans = 0;
for ($i = 0; true; $i++) {
    if ($H == 1) {
        $ans += 2 ** $i;
        break;
    }
    $ans += 2 ** $i;
    $H = floor($H/2);
}
echo $ans;

exit;
// C
fscanf(STDIN, '%d %d', $N, $K);
$H = array_map('intval', explode(' ', trim(fgets(STDIN))));
if ($K > count($H)) {
    $ans = 0;
} else {
    rsort($H);
    $h = array_slice($H, $K);
    $ans = array_sum($h);
}
echo $ans;

exit;
// B
fscanf(STDIN, '%d %d', $H, $N);
$A = array_map('intval', explode(' ', trim(fgets(STDIN))));
if (array_sum($A) >= $H) {
    $ans = 'Yes';
} else {
    $ans = 'No';
}
echo $ans;

exit;
// A
fscanf(STDIN, '%d %d', $H, $A);
$ans = ceil($H / $A);
echo $ans;
