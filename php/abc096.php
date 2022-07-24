<?php

// D
fscanf(STDIN, '%d', $n);
$primes = primesArr(55555);
$ans = [];
foreach ($primes as $p) {
    if ($p % 5 === 1) {
        $ans[] = $p;
    }
    if (count($ans) === $n) {
        break;
    }
}
echo implode(' ', $ans);

/**
 * 素数列挙（エラトステネスのふるい）
 * $max以下の素数を格納した配列を返す
 */
function primesArr($max)
{
    $arr = array_fill(2, $max - 1, true);
    $rmax = (int) floor(sqrt($max));
    for ($i = 2; $i <= $rmax; $i++) {
        if (!isset($arr[$i])) {
            continue;
        }
        for ($j = 2 * $i; $j <= $max; $j += $i) {
            unset($arr[$j]);
        }
    }
    return array_keys($arr);
}

exit;

// C
define('BLACK', '#');
define('WHITE', '.');
fscanf(STDIN, '%d %d', $h, $w);
for ($i  = 0; $i < $h; $i++) {
    $s[] = trim(fgets(STDIN));
}
$g = array_fill(0, $h * $w, []);
for ($i  = 0; $i < $h * $w; $i++) {
    $l = intval(floor($i / $w));
    $m = $i % $w;

    if ($s[$l][$m] === WHITE) {
        continue;
    }

    // 上
    if ($l > 0 && $s[$l - 1][$m] === BLACK) {
        continue;
    }
    // 右
    if ($m < $w - 1 && $s[$l][$m + 1] === BLACK) {
        continue;
    }
    // 下
    if ($l < $h - 1 && $s[$l + 1][$m] === BLACK) {
        continue;
    }
    // 右
    if ($m > 0 && $s[$l][$m - 1] === BLACK) {
        continue;
    }

    exit('No');
}
echo 'Yes';

exit;

// B
fscanf(STDIN, '%d %d %d', $a, $b, $c);
fscanf(STDIN, '%d', $k);
echo $a + $b + $c + max($a, $b, $c) * (pow(2, $k) - 1);


exit;

// A
fscanf(STDIN, '%d %d', $a, $b);
echo $a > $b ? $a - 1 : $a;
