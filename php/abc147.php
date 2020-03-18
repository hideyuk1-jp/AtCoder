<?php
// バーチャル参加でCまでAC 600 69:22 => 推定パフォーマンス999

define('MOD', 10 ** 9 + 7);

fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$ans = 0;
for ($i = 0; $i < $n - 1; $i++) {
    for ($j = $i + 1; $j < $n; $j++) {
        $ans = modAdd($ans,  (int) ($a[$i] ^ $a[$j]));
    }
}
echo $ans . PHP_EOL;

function modAdd($x, $y)
{
    return ($x + $y) % MOD;
}

exit;

fscanf(STDIN, '%d', $n);
$g = array_fill(0, $n, []);
for ($i = 0; $i < $n; $i++) {
    fscanf(STDIN, '%d', $a);
    for ($j = 0; $j < $a; $j++) {
        fscanf(STDIN, '%d %d', $x, $y);
        $x--; // 添字 0から
        $g[$i][] = [$x, $y];
    }
}

// bit全探索
// 1: 正直者 0:不親切
$ans = 0;
for ($i = 2 ** $n - 1; $i >= 0; $i--) {
    $flag = true;
    for ($j = 0; $j < $n; $j++) {
        if (($i >> $j) & 1) {
            foreach ($g[$j] as $v) {
                if ($v[1] !== (($i >> $v[0]) & 1)) {
                    $flag = false;
                    break 2;
                }
            }
        }
    }
    $cnt = 0;
    if ($flag) {
        for ($j = 0; $j < $n; $j++) {
            if (($i >> $j) & 1) {
                $cnt++;
            }
        }
    }
    $ans = max($ans, $cnt);
}
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%s', $s);
$n = strlen($s);
$ans = 0;
for ($i = 0; $i < $n / 2; $i++) {
    if ($s[$i] !== $s[$n - 1 - $i]) $ans++;
}
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d %d %d', $a1, $a2, $a3);
$ans = $a1 + $a2 + $a3 >= 22 ? 'bust' : 'win';
echo $ans . PHP_EOL;
