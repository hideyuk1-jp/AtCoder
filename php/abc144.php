<?php
fscanf(STDIN, '%d %d', $n, $k);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$f = array_map('intval', explode(' ', trim(fgets(STDIN))));
rsort($a);
sort($f);
$q = new SplPriorityQueue;
for ($i = 0; $i < $n; $i++) {
    $q->insert([$a[$i] * $f[$i], $a[$i], $f[$i]], $a[$i] * $f[$i]);
}


for ($i = 0; $i < $k; $i++) {
    $_q = $q->extract();
    if ($_q[1] === 0) break;
    $q->insert([($_q[1] - 1) * $_q[2], $_q[1] - 1, $_q[2]], ($_q[1] - 1) * $_q[2]);
}
$ans = 0;
while ($q->count() > 0) {
    $ans = max($ans, $q->extract()[0]);
}
echo $ans.PHP_EOL;

exit;

# c
fscanf(STDIN, '%d', $n);
$ans = $n - 1;
for ($i = 2; $i <= sqrt($n); $i++) {
    if ($n % $i === 0) {
        $ans = min($ans, $i + $n / $i - 2);
    }
}
echo $ans.PHP_EOL;

exit;

fscanf(STDIN, '%d %d %d', $a, $b, $x);

if ($x > $a * $a * $b / 2) {
    $_a = $a;
    $_b = -2 * ($x / $a / $a - $b);
} else {
    $_a = $x / $b / $a * 2;
    $_b = $b;
}
$ans = rad2deg(atan2($_b, $_a));
echo $ans.PHP_EOL;

exit;

fscanf(STDIN, '%d', $n);
$arr = pf($n);
$a = 1;
$b = 1;
foreach ($arr as $v) {
    if ($a <= $b) $a *= $v;
    else $b *= $v;
}
$ans = $a + $b - 2;
echo $ans.PHP_EOL;

function pf($n){
    $is_prime = is_prime($n);
    if ($is_prime[$n] === '1') return [$n];
    $init = 2; //１以外の最初の素数
    while ($n !== 1) { //$nが1になるまで繰り返す
        $i = $init;
        while ($i <= $n) { //$iの上限を設定
            if ($n % $i == 0) { //$nが$iで割り切れた場合
                $result[] = $i; //$iを素因数として配列に格納
                $n /= $i; //$nを$iで割って$nに代入。
                break;
            }
            $i++; //$iに1をプラス
        }
        $init = $i;
    }
   return $result;
}

function is_prime($max) {
    $arr = str_repeat('1', $max + 1);
    $arr[0]  = $arr[1] = '0';
    $rmax = floor(sqrt($max));
    for ($i = 2; $i <= $rmax; $i++) {
        for ($j = 2 * $i; $j <= $max; $j += $i) {
            $arr[$j] = '0';
        }
    }
    return $arr;
}

exit;

fscanf(STDIN, '%d', $n);
$ans = 'No';
for ($i = 1; $i < 10; $i++) {
    for ($j = 1; $j < 10; $j++) {
        if ($i * $j === $n) $ans = 'Yes';
    }
}
echo $ans.PHP_EOL;

exit;

fscanf(STDIN, '%d %d', $a, $b);
if (max($a, $b) > 9) $ans = -1;
else $ans = $a * $b;
echo $ans.PHP_EOL;
