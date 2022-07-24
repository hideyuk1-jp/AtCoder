<?php

fscanf(STDIN, '%s', $s);
fscanf(STDIN, '%d', $q);
$cnt = 0;
for ($i = 0; $i < $q; $i++) {
    $query[] = explode(' ', trim(fgets(STDIN)));
    if ($query[count($query) - 1][0] === '1') {
        $cnt++;
    }
    $rev_cnt[] = $cnt;
}
//var_dump($rev_cnt);
if ($rev_cnt[$q - 1] % 2 === 0) {
    $ans = $s;
} else {
    $ans = strrev($s);
}
$left = $right = '';
for ($i = 0; $i < $q; $i++) {
    if ($query[$i][0] === '1') {
        continue;
    }
    if (($rev_cnt[$q - 1] - $rev_cnt[$i]) % 2 === 0) {
        $tmp = $query[$i][2];
        if ($query[$i][1] === '1') {
            $left .= $tmp;
        }
        if ($query[$i][1] === '2') {
            $right .= $tmp;
        }
    } else {
        $tmp = strrev($query[$i][2]);
        if ($query[$i][1] === '1') {
            $right .= $tmp;
        }
        if ($query[$i][1] === '2') {
            $left .= $tmp;
        }
    }
}
$ans = strrev($left) . $ans . $right;
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d %d', $a, $b);
$ans = -1;
for ($i = 1; $i <= 2000; $i++) {
    $x = intval(floor($i * 0.08));
    $y = intval(floor($i * 0.10));
    if ($x === $a && $y === $b) {
        $ans = $i;
        break;
    }
}
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d %d %d', $n, $a, $b);
if ($a === 0) {
    $ans = 0;
} else {
    $ans = $a * intval(floor($n / ($a + $b))) + min($a, $n % ($a + $b));
}
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%s', $s);
$s = str_split($s);
if (count(array_unique($s)) > 1) {
    $ans = 'Yes';
} else {
    $ans = 'No';
}
echo $ans . PHP_EOL;
