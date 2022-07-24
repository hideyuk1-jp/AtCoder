<?php

fscanf(STDIN, '%d', $n);
$q = new SplPriorityQueue();
for ($i  = 0; $i < $n; $i++) {
    fscanf(STDIN, '%d %d', $a, $b);
    $q->insert([$a, $b], 10 ** 9 - $b);
}

$flag = true;
$t = 0;
while (!$q->isEmpty()) {
    $s = $q->extract();
    $t += $s[0];
    if ($t > $s[1]) {
        $flag = false;
        break;
    }
}
if ($flag) {
    echo 'Yes'.PHP_EOL;
} else {
    echo 'No'.PHP_EOL;
}

exit();

// 入力
fscanf(STDIN, '%d %d %d %d', $a, $b, $c, $d);

$ans = 0;

$e = lcm($c, $d);

$ans += $b - $a +1;
$ans -= intdiv($b, $c) - intdiv($a - 1, $c);
$ans -= intdiv($b, $d) - intdiv($a - 1, $d);
$ans += intdiv($b, $e) - intdiv($a - 1, $e);

echo $ans.PHP_EOL;

function gcd($m, $n)
{
    if ($n > $m) {
        list($m, $n) = [$n, $m];
    }

    if ($m % $n === 0) {
        return $n;
    } else {
        return gcd($n, $m % $n);
    }
}

function lcm($m, $n)
{
    return $m * $n / gcd($m, $n);
}

exit();

// 入力
fscanf(STDIN, '%d %d', $n, $l);
$absmin = 10000;
$sum = 0;
for ($i = 0; $i < $n; $i++) {
    $aji = $l + $i;
    $sum += $aji;
    if (abs($aji) < abs($absmin)) {
        $absmin = $aji;
    }
}
echo($sum - $absmin).PHP_EOL;

exit();

const MOD = 10 ** 9 + 7;
// 入力
fscanf(STDIN, '%s', $pass);

for ($i = 0; $i < strlen($pass) - 1; $i++) {
    if ($pass[$i] === $pass[$i + 1]) {
        echo 'Bad'.PHP_EOL;
        exit();
    }
}
echo 'Good'.PHP_EOL;
