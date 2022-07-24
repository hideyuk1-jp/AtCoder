<?php

fscanf(STDIN, '%d', $n);
fscanf(STDIN, '%s', $s);

$memo; // $memo[$i][$j] : $j番目の文字列から長さ$i分の文字列
function func($x)
{
    global $memo, $n, $s;

    if ($x === 0) {
        $memo[1][0] = $s[0];
        for ($i = 1; $i < $n; $i++) {
            $memo[$i + 1][0] = $memo[$i][0] . $s[$i];
        }
    } else {
        for ($i = 0; $i < $n - $x; $i++) {
            $memo[$i + 1][$x] = substr($memo[$i + 2][$x - 1], 1);
        }
    }
}
for ($i = 0; $i < $n; $i++) {
    func($i);
}
$ans = 0;
for ($i = (int)floor($n / 2); $i >= 1; $i--) {
    $arr = array_unique($memo[$i]);
    foreach ($arr as $v) {
        if (substr_count($s, $v) > 1) {
            $ans = $i;
            break 2;
        }
    }
}
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d %d', $n, $m);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$q = new SplPriorityQueue();
for ($i = 0; $i < $n; $i++) {
    $q->insert($a[$i], $a[$i]);
}
$i = 0;
while ($i < $m) {
    $x = $q->extract();
    $x = $x / 2;
    $q->insert($x, $x);
    $i++;
}
$ans = 0;
while ($q->count() > 0) {
    $ans += (int)floor($q->extract());
}
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d %d %d', $n, $k, $q);
$arr = array_fill(0, $n, 0);
for ($i  = 0; $i < $q; $i++) {
    fscanf(STDIN, '%d', $a);
    $arr[$a - 1]++;
}
for ($i = 0; $i < $n; $i++) {
    if ($k - $q + $arr[$i] > 0) {
        echo 'Yes' . PHP_EOL;
    } else {
        echo 'No' . PHP_EOL;
    }
}

exit();

fscanf(STDIN, '%s', $s);
$n = strlen($s);
$ans = 'Yes';
for ($i = 0; $i < $n; $i++) {
    if (($i % 2 === 0 && $s[$i] === 'L') || ($i % 2 === 1 && $s[$i] === 'R')) {
        $ans = 'No';
        break;
    }
}
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%s', $s);
if ($s === 'Sunny') {
    $ans = 'Cloudy';
} elseif ($s === 'Cloudy') {
    $ans = 'Rainy';
} elseif ($s === 'Rainy') {
    $ans = 'Sunny';
}
echo $ans . PHP_EOL;
