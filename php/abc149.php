<?php
fscanf(STDIN, '%d %d', $n, $k);
fscanf(STDIN, '%d %d %d', $r, $s, $p);
fscanf(STDIN, '%s', $t);

$cnt = [
    'r' => substr_count($t, 'r'),
    's' => substr_count($t, 's'),
    'p' => substr_count($t, 'p'),
];
$flg = array_fill(0, $n, 0);

for ($i = $n - 1; $i >= $k; $i--) {
    if ($flg[$i]) continue;
    if ($t[$i] == $t[$i-$k]) {
        $flg[$i-$k] = 1;
        $cnt[$t[$i]]--;
    }
}

$ans = $cnt['r'] * $p + $cnt['s'] * $r + $cnt['p'] * $s;
echo $ans.PHP_EOL;

exit();

fscanf(STDIN, '%d', $x);

while (true) {
    if (!is_prime($x)) $x++;
    else break;
}

echo $x.PHP_EOL;

function is_prime($n) {
    $lim = floor(sqrt($n));
    for ($i = 2; $i <= $lim; $i++) {

        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

exit();

fscanf(STDIN, '%d %d %d', $a, $b, $k);

$ea = max(0, $a - $k);
$eb = max(0, $b - max(0, $k - $a));

echo $ea.' '.$eb.PHP_EOL;

exit();

fscanf(STDIN, '%s %s', $s, $t);

echo $t.$s.PHP_EOL;