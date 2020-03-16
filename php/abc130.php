<?php
// D: 累積和と二分探索が使える
fscanf(STDIN, '%d %d', $n, $k);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));

// 累積和
$s[0] = 0;
for($i = 0; $i < $n; $i++) {
    $s[$i + 1] = $a[$i] + $s[$i];
}

$cnt = 0;
for($i = 0; $i < $n; $i++) {
    if ($s[$i + 1] < $k) continue;
    if ($s[$i + 1] === $k) {
        $cnt++;
        continue;
    }

    // 二分探索
    $left = 0; $right = $i + 1; $mid = floor(($left + $right) / 2);
    while ($right - $left > 1) {
        if ($s[$i + 1] - $s[$mid] >= $k) $left = $mid;
        else $right = $mid;
        $mid = floor(($left + $right) / 2);
    }
    $cnt += $mid + 1;
}
echo $cnt.PHP_EOL;

exit();

// C
fscanf(STDIN, '%d %d %d %d', $w, $h, $x, $y);

$s = (double)($w * $h / 2);
if ($x === $w / 2 && $y === $h / 2) echo $s.' '.(1).PHP_EOL;
else echo $s.' '.(0).PHP_EOL;

exit();