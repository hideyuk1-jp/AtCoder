<?php

fscanf(STDIN, '%d', $N);
fscanf(STDIN, '%d', $K);

$keta = keta($N);

function keta($n)
{
    return strlen(strval($n));
}

if ($keta < $K) {
    echo(0) . PHP_EOL;
    exit;
}

$n = 1;
$r = 1;

for ($i = 1; $i <= $K; $i++) {
    $n *= $keta - $i + 1;
    $r *= $i;
}

$kumiawase = $n / $r;

$ans = $kumiawase * (9 ** $K);

$_K = $K - 1;
$_N %= 10 ** keta($N);

$cnt = 0;
while (true) {
    $n = $r = 1;
    $_keta = keta($_N);
    for ($i = 1; $i <= $_K; $i++) {
        $n *= $_keta - $i;
        $r *= $i;
    }
    $kumiawase = $n / $r;
    $ans -= max(9 - intval(strval($_N)[0]), 0) * $kumiawase * (9 ** $_K);
    $_K--;
    $_N %= 10 ** $_keta;
    $cnt++;
    if ($_K < 0) {
        break;
    }
}
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d %d', $N, $K);
$p = array_map('intval', explode(' ', trim(fgets(STDIN))));
$max = 0;
$sum = 0;
$pre = 0;
for ($i = 0; $i < $N - $K + 1; $i++) {
    $cur = ($p[$i + $K - 1] + 1) / 2;
    if ($i == 0) {
        for ($j = 0; $j < $K; $j++) {
            $sum += ($p[$j] + 1) / 2;
        }
    } else {
        $sum += $cur - $pre;
    }
    if ($max < $sum) {
        $max = $sum;
    }
    $pre = ($p[$i] + 1) / 2;
}
echo $max . PHP_EOL;

exit;

fscanf(STDIN, '%d', $N);
$A = array_map('intval', explode(' ', trim(fgets(STDIN))));
$_A = array_unique($A);
$ans = (count($A) == count($_A)) ? 'YES' : 'NO';

echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%s', $S);

echo str_repeat('x', strlen($S)) . PHP_EOL;

exit;

fscanf(STDIN, '%s %s', $S, $T);
fscanf(STDIN, '%d %d', $A, $B);
fscanf(STDIN, '%s', $U);
if ($U == $S) {
    $A--;
} else {
    $B--;
}
echo $A . ' ' . $B . PHP_EOL;
