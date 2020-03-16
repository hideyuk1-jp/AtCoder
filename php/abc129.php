<?php
fscanf(STDIN, '%d %d', $h, $w);
for($i = 1; $i <= $h; $i++) {
    fscanf(STDIN, '%s', $s);
    $map[$i] = '#' . $s . '#';
}
$map[0] = $map[$h + 1] = str_repeat('#', $w + 2);

// 横方向
for($i = 1; $i <= $h; $i++) {
    $dw = 0;
    for($j = 1; $j <= $w + 1; $j++) {
        if ($map[$i][$j] === '#') {
            for ($k = $j - $dw; $k < $j; $k++) $hlight[$i][$k] = $dw;
            $dw = 0;
        } else {
            $dw++;
        }
    }
}

// 縦方向
$max = 0;
for($j = 1; $j <= $w; $j++) {
    $dw = 0;
    for($i = 1; $i <= $h + 1; $i++) {
        if ($map[$i][$j] === '#') {
            for ($k = $i - $dw; $k < $i; $k++) {
                $vlight[$k][$j] = $dw;
                $light = $hlight[$k][$j] + $vlight[$k][$j] - 1;
                $max = max($light, $max);
            }
            $dw = 0;
        } else {
            $dw++;
        }
    }
}
echo $max . PHP_EOL;

exit();

$up_dp[0] = array_fill(1, $w, 0);
$down_dp[$h + 1] = array_fill(1, $w, 0);
for($i = 1; $i <= $h; $i++) {
    $left_dp[$i][0] = 0;
    $right_dp[$i][$w + 1] = 0;
}

for($i = 1; $i <= $h; $i++) {
    for($j = 1; $j <= $w; $j++) {
        if ($s[$i-1][$j-1] === '#') {
            $up_dp[$i][$j] = 0;
            $left_dp[$i][$j] = 0;
        } else {
            $up_dp[$i][$j] = $up_dp[$i - 1][$j] + 1;
            $left_dp[$i][$j] =  $left_dp[$i][$j - 1] + 1;
        }

        $irev = $h - $i + 1;
        $jrev = $w - $j + 1;
        if ($s[$irev-1][$jrev-1] === '#') {
            $down_dp[$irev][$jrev] = 0;
            $right_dp[$irev][$jrev] = 0;
        } else {
            $down_dp[$irev][$jrev] = $down_dp[$irev + 1][$jrev] + 1;
            $right_dp[$irev][$jrev] =  $right_dp[$irev][$jrev + 1] + 1;
        }
    }
}

$max = 0;
for($i = 1; $i <= $h; $i++) {
    for($j = 1; $j <= $w; $j++) {
        if ($s[$i-1][$j-1] === '#') continue;
        $num = $up_dp[$i][$j] + $left_dp[$i][$j] + $down_dp[$i][$j] + $right_dp[$i][$j] - 3;
        $max = max($max, $num);
    }
}
echo $max . PHP_EOL;

exit();

define('MOD', 10 ** 9 + 7);

fscanf(STDIN, '%d %d', $n, $m);
$step = array_fill(1, $n, true);
for ($i  = 1; $i <= $n; $i++) {
    fscanf(STDIN, '%d', $a);
    $step[$a] = false;
    if (!($step[$a - 1] ?? true)) {
        echo (0) . PHP_EOL;
        exit();
    }
}

$dp[0] = 1;
for ($i = 0; $i < $n; $i++) {
    if (!$step[$i + 1]) {
        $dp[$i + 1] = 0;
        continue;
    }
    $dp[$i + 1] = ($dp[$i] + ($dp[$i - 1] ?? 0)) % MOD;
}
echo $dp[$n] . PHP_EOL;


exit();

fscanf(STDIN, '%d', $n);
$w = array_map('intval', explode(' ', trim(fgets(STDIN))));

$sum[0] = 0;
for($i = 1; $i <= $n; $i++) {
    $sum[$i] = $sum[$i - 1] + $w[$i - 1];
}
$min = 100000;
for($i = 1; $i < $n; $i++) {
    $s1 = $sum[$i];
    $s2 = $sum[$n] - $sum[$i];
    $d = abs($s1- $s2);
    $min = min($d, $min);
}
echo $min . PHP_EOL;

exit();

fscanf(STDIN, '%d %d %d', $p, $q, $r);
echo min($p+$q, $p+$r, $q+$r).PHP_EOL;