<?php
define('MOD', 10 ** 9 + 7);

fscanf(STDIN, '%d', $n);
fscanf(STDIN, '%s', $s);

if ($s[0] === 'W' || $s[2 * $n - 1] === 'W') {
    echo (0) . PHP_EOL;
    exit();
}

$lr[0] = 'L';
$l_cnt_sum[0] = 0;
$l_cnt_sum[1] = 1;
$l_cnt = 1;
$r_cnt = 0;
$x = 1;
for ($i = 1; $i < 2 * $n; $i++) {
    if ($s[$i] !== $s[$i - 1]) {
        if ($lr[$i - 1] === 'L') $lr[$i] = 'L';
        else $lr[$i] = 'R';
    } else {
        if ($lr[$i - 1] === 'L') $lr[$i] = 'R';
        else $lr[$i] = 'L';
    }
    if ($lr[$i] === 'L') {
        $l_cnt_sum[$i + 1] = $l_cnt_sum[$i] + 1;
        $l_cnt++;
    } else {
        $x = $x * ($l_cnt_sum[$i] - $r_cnt) % MOD;
        $l_cnt_sum[$i + 1] = $l_cnt_sum[$i];
        $r_cnt++;
    }
}

if ($l_cnt !== $r_cnt) {
    echo (0) . PHP_EOL;
    exit();
}

$ans = $x * kaijou($n) % MOD;
echo $ans . PHP_EOL;

function kaijou($n) {
    return $n > 1 ? $n * kaijou($n - 1) % MOD : 1;
}

exit();

fscanf(STDIN, '%d %d', $n, $k);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));

$cnt1 = $cnt2 = 0;
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n; $j++) {
        if ($i === $j) continue;

        if ($i < $j && $a[$i] > $a[$j]) $cnt1++;
        elseif ($i > $j && $a[$i] > $a[$j]) $cnt2++;
    }
}

$x1 = (1 + $k) * $k / 2 % MOD;
$x2 = (1 + $k - 1) * ($k - 1) / 2 % MOD;
$ans = (($cnt1 * $x1) % MOD + ($cnt2 * $x2) % MOD) % MOD;
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d %d', $m, $d);
$ans = 0;
for ($i = 1; $i <= $m; $i++) {
    for ($j = 1; $j <= $d; $j++) {
        $d1 = $j % 10;
        $d10 = floor($j / 10);
        if ($d1 >= 2 && $d10 >= 2 && (int)($d1 * $d10) === $i) $ans++;
    }
}
echo $ans . PHP_EOL;