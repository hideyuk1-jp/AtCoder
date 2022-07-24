<?php

fscanf(STDIN, '%d %d', $a, $b);
$ans = func($b) ^ func($a - 1);
echo $ans . PHP_EOL;

function func($n)
{
    if ($n % 2 === 0) {
        $n2 = ($n / 2) % 2 ? 1 : 0;
        return $n2 ^ $n;
    }
    return (int)ceil($n / 2) % 2 ? 1 : 0;
}

exit();

fscanf(STDIN, '%d %d', $n, $m);
$q = new SplPriorityQueue();
for ($i  = 0; $i < $n; $i++) {
    fscanf(STDIN, '%d %d', $a, $b);
    $q->insert([$b, $a], -$a);
}
$num = 0;
$ans = 0;
while ($num < $m) {
    list($dn, $dv) = $q->extract();
    $_num = min($m - $num, $dn);
    $ans += $dv * $_num;
    $num += $_num;
}
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d %d %d', $n, $m, $c);
$b = array_map('intval', explode(' ', trim(fgets(STDIN))));
$ans = 0;
for ($i  = 0; $i < $n; $i++) {
    $a = array_map('intval', explode(' ', trim(fgets(STDIN))));
    $sum = 0;
    for ($j = 0; $j < $m; $j++) {
        $sum += $a[$j] * $b[$j];
    }
    $sum += $c;
    if ($sum > 0) {
        $ans++;
    }
}
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d %d', $H, $W);
fscanf(STDIN, '%d %d', $h, $w);
$ans = $H * $W - $h * $W - $w * $H + $h * $w;
echo $ans . PHP_EOL;
