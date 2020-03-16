<?php
fscanf(STDIN, '%d %d %d %d', $x, $y, $z, $k);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$b = array_map('intval', explode(' ', trim(fgets(STDIN))));
$c = array_map('intval', explode(' ', trim(fgets(STDIN))));

rsort($a);
rsort($b);
rsort($c);

$q = new SplPriorityQueue;
$q->insert([$a[0] + $b[0] +$c[0], 0, 0, 0], $a[0] + $b[0] + $c[0]);
for ($i = 0; $i < $k; $i++) {
    list($max, $ai, $bi, $ci) = $q->extract();
    echo $max . PHP_EOL;
    addQueue($ai + 1, $bi, $ci);
    addQueue($ai, $bi + 1, $ci);
    addQueue($ai, $bi, $ci + 1);
}

function addQueue($ai, $bi, $ci) {
    global $a, $b, $c, $q;
    static $added;

    if (isset($added[$ai][$bi][$ci])) return;
    if (!isset($a[$ai]) || !isset($b[$bi]) || !isset($c[$ci])) return;

    $q->insert([$a[$ai] + $b[$bi] + $c[$ci], $ai, $bi, $ci], $a[$ai] + $b[$bi] + $c[$ci]);
    $added[$ai][$bi][$ci] = true;
}

exit();

fscanf(STDIN, '%d', $n);
for ($i = 0; $i < 5; $i++) fscanf(STDIN, '%d', $arr[]);
$min = min($arr);
$ans = (int)ceil($n / $min - 1) + 5;
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d', $arr[]);
fscanf(STDIN, '%d', $arr[]);
fscanf(STDIN, '%d', $arr[]);
fscanf(STDIN, '%d', $arr[]);
fscanf(STDIN, '%d', $arr[]);

$min = $arr[0] % 10;
$min_i = 0;
foreach ($arr as $i => $v) {
    $d1 = $v % 10;
    $_arr[] = (int)(ceil($v / 10) * 10);
    if ($d1 > 0 && $d1 < $min) {
        $min = $d1;
        $min_i = $i;
    }
}
$_arr[$min_i] = $arr[$min_i];
$ans = array_sum($_arr);
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d', $a);
fscanf(STDIN, '%d', $b);
fscanf(STDIN, '%d', $c);
fscanf(STDIN, '%d', $d);
fscanf(STDIN, '%d', $e);
fscanf(STDIN, '%d', $k);
if ($e - $a > $k) $ans = ':(';
else $ans = 'Yay!';
echo $ans . PHP_EOL;