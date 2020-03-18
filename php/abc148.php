<?php
fscanf(STDIN, '%d', $n);
if ($n % 2 === 1) {
    echo (0) . PHP_EOL;
    exit;
}
$ans = 0;
$num = 10;
while ($num <= $n) {
    $ans += intdiv($n, $num);
    $num *= 5;
}
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$cnt = 0;
for ($i = 0; $i < $n; $i++) {
    if ($a[$i] === $cnt + 1) {
        $cnt++;
    }
}
$ans = $cnt ? count($a) - $cnt : -1;
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d %d', $a, $b);
$ans = lcm($a, $b);
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
fscanf(STDIN, '%s %s', $s, $t);
$ans = '';
for ($i = 0; $i < $n; $i++) {
    $ans .= $s[$i] . $t[$i];
}
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d', $a);
fscanf(STDIN, '%d', $b);
$ans = 1;
while ($ans === $a || $ans === $b) {
    $ans++;
}
echo $ans . PHP_EOL;
