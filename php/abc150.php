<?php
fscanf(STDIN, '%d %d', $n, $m);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$lcm = lcmAll($a);
for ($i = 0; $i < $n; ++$i) {
    if ($lcm / $a[$i] % 2 === 0) {
        echo (0) . PHP_EOL;
        exit;
    }
}
$ans = floor((2 * $m + $lcm) / (2 * $lcm));
echo $ans . PHP_EOL;

// 最大公約数（2つ）
function gcd($m, $n)
{
    if (!$n) return $m;
    return gcd($n, $m % $n);
}

// 最大公約数（3つ以上）
function gcdAll($arr)
{
    $gcd = $arr[0];
    for ($i = 0; $i < count($arr); $i++) {
        $gcd = gcd($gcd, $arr[$i]);
    }
    return $gcd;
}

// 最小公倍数（2つ）
function lcm($m, $n)
{
    return $m * $n / gcd($m, $n);
}

// 最小公倍数（3つ以上）
function lcmAll($arr)
{
    $lcm = $arr[0];
    for ($i = 0; $i < count($arr); $i++) {
        $lcm = lcm($lcm, $arr[$i]);
    }
    return $lcm;
}

exit;

fscanf(STDIN, '%d', $n);
$p = array_map('intval', explode(' ', trim(fgets(STDIN))));
$q = array_map('intval', explode(' ', trim(fgets(STDIN))));
$arr = junretsu($n);
sort($arr);
foreach ($arr as $i => $v) {
    if (implode('', $v) === implode('', $p)) $a = $i + 1;
    if (implode('', $v) === implode('', $q)) $b = $i + 1;
}
$ans = abs($a - $b);
echo $ans . PHP_EOL;

function junretsu($n)
{
    if ($n === 1) return [[1]];
    $arr = [];
    foreach (junretsu($n - 1) as $v) {
        for ($i = 0; $i < $n; $i++) {
            $arr2 = $v;
            array_splice($arr2, $i, 0, $n);
            $arr[] = $arr2;
        }
    };
    return $arr;
}


exit;

fscanf(STDIN, '%d', $n);
fscanf(STDIN, '%s', $s);
preg_match_all('/ABC/', $s, $matches);
$ans = count($matches[0]);
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d %d', $k, $x);
$ans = $k * 500 >= $x ? 'Yes' : 'No';
echo $ans . PHP_EOL;
