<?php

// D
fscanf(STDIN, '%d %d', $h, $w);
for ($i = 0; $i < $h; $i++) {
    $a[] = array_map('intval', explode(' ', trim(fgets(STDIN))));
}
$moving = false;
$his = [];
for ($i = 0; $i < $h; $i++) {
    if ($i % 2 === 0) {
        $s = 0;
        $e = $w - 1;
        $p = 1;
    } else {
        $s = $w - 1;
        $e = 0;
        $p = -1;
    }
    for ($j = $s; $j != $e + $p; $j += $p) {
        if (!($a[$i][$j] & 1)) {
            if ($moving) {
                $his[] = implode(' ', [$pi + 1, $pj + 1, $i + 1, $j + 1]);
                list($pi, $pj) = [$i, $j];
            }
            continue;
        }
        if ($moving) {
            $his[] = implode(' ', [$pi + 1, $pj + 1, $i + 1, $j + 1]);
            $moving = false;
        } else {
            list($pi, $pj) = [$i, $j];
            $moving = true;
        }
    }
}
echo count($his) . PHP_EOL;
echo implode(PHP_EOL, $his);

exit;

// C
fscanf(STDIN, '%d %d', $N, $X);
$x = array_map('intval', explode(' ', trim(fgets(STDIN))));
$gcd = abs($x[0] - $X);
for ($i = 0; $i < $N; $i++) {
    $gcd = gcd($gcd, abs($x[$i] - $X));
}
echo $gcd;

// 最大公約数（2つ）
function gcd($m, $n)
{
    if (!$n) {
        return $m;
    }
    return gcd($n, $m % $n);
}

exit;

// B
fscanf(STDIN, '%d', $n);
$ans = 'Yes';
for ($i  = 0; $i < $n; $i++) {
    fscanf(STDIN, '%s', $w);
    if (isset($x[$w])) {
        $ans = 'No';
    } else {
        $x[$w] = $w;
    }
    if ($i !== 0) {
        if (substr($w, 0, 1) !== $pl) {
            $ans = 'No';
        }
    }
    $pl = substr($w, -1, 1);
}
echo $ans;

exit;

// A
fscanf(STDIN, '%d %d', $a, $b);
echo ($a * $b & 1) ? 'Yes' : 'No';
