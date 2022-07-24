<?php

fscanf(STDIN, '%d', $n);
$l = array_map('intval', explode(' ', trim(fgets(STDIN))));
sort($l);

$ans = 0;
for ($i = 0; $i < $n-2; $i++) {
    for ($j = $i+1; $j < $n-1; $j++) {
        if ($l[$j+1] >= $l[$i]+$l[$j]) {
            continue;
        }

        if ($l[$j+1] > abs($l[$i]-$l[$j])) {
            $start = $j + 1;
        } else {
            $left = $j+1;
            $right = $n-1;

            while ($right - $left > 1) {
                $mid = floor(($left + $right) / 2);
                if ($l[$mid] > abs($l[$i]-$l[$j])) {
                    $right = $mid;
                } else {
                    $left = $mid;
                }
            }
            $start = $right;
        }

        if ($l[$n-1] < $l[$i]+$l[$j]) {
            $end = $n -1;
        } else {
            $left = $j+1;
            $right = $n-1;

            while ($right - $left > 1) {
                $mid = floor(($left + $right) / 2);
                if ($l[$mid] < $l[$i]+$l[$j]) {
                    $left = $mid;
                } else {
                    $right = $mid;
                }
            }
            $end = $left;
        }

        $ans += $end - $start + 1;
    }
}
echo $ans.PHP_EOL;

exit;

fscanf(STDIN, '%d', $n);
fscanf(STDIN, '%s', $s);
$ans = 0;
$s[$n] = "";
for ($i = 0; $i < $n; $i++) {
    if ($s[$i] !== $s[$i+1]) {
        $ans++;
    }
}
echo $ans.PHP_EOL;

exit;

fscanf(STDIN, '%d', $n);
$d = array_map('intval', explode(' ', trim(fgets(STDIN))));
$ans = 0;
for ($i = 0; $i < $n - 1; $i++) {
    for ($j = $i + 1; $j < $n; $j++) {
        $ans += $d[$i] * $d[$j];
    }
}
echo $ans.PHP_EOL;

exit;

fscanf(STDIN, '%d %d', $a, $b);
$ans = max($a-$b*2, 0);
echo $ans.PHP_EOL;
