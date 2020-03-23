<?php
// バーチャル CまでAC 600 24:38 => 推定パフォ 1307
// D
fscanf(STDIN, '%d', $n);
for ($i = 1; $i <= $n; $i++) {
    $div[$i] = divisors($i);
}
echo (2 ** 100) . PHP_EOL;
$sum = 0;
for ($i = 0; $i < 2 ** $n; $i++) {
    $tdiv = [];
    for ($j = 0; $j < $n; $j++) {
        if (($i >> $j) & 1) {
            $tdiv = array_merge($tdiv, $div[$j + 1]);
        }
    }
    $tdiv = array_unique($tdiv);
    if (count($tdiv) === 75) $sum++;
}
echo $sum;

function divisors($max)
{
    $arr = [];
    $rmax = (int) floor(sqrt($max));
    for ($i = 1; $i <= $rmax; $i++) {
        if ($max % $i === 0) {
            $arr[] = $i;
            $arr[] = $max / $i;
        }
    }
    sort($arr);
    return array_unique($arr);
}

exit;

// C
fscanf(STDIN, '%d', $n);
$cnt = cnt753(7) + cnt753(5) + cnt753(3);
echo $cnt;

function cnt753($x)
{
    global $n;

    if ($x > $n) return 0;
    $sx = strval($x);

    $cnt = 0;

    if (substr_count($sx, '7') > 0 && substr_count($sx, '5') > 0 && substr_count($sx, '3') > 0) {
        $cnt++;
    }
    $cnt += cnt753((int) ('7' . $sx));
    $cnt += cnt753((int) ('5' . $sx));
    $cnt += cnt753((int) ('3' . $sx));
    return $cnt;
}

exit;

// B
fscanf(STDIN, '%s', $s);
$n = strlen($s);
$min = 1000;
for ($i = 0; $i < $n - 2; $i++) {
    $x = abs((int) substr($s, $i, 3) - 753);
    $min = min($x, $min);
}
echo $min;

exit;

// A
fscanf(STDIN, '%d', $x);
echo ($x === 3 || $x === 5 || $x === 7) ? 'YES' : 'NO';
