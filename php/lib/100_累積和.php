<?php
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));

// 累積和
$sum = array_fill(0, $n + 1, 0);
for ($i = 0; $i < $n; $i++) {
    $sum[$i + 1] = $sum[$i] + $a[$i];
}

echo implode(' ', $sum) . PHP_EOL;

// 区間 [left, right) の総和を求める
fscanf(STDIN, '%d %d', $left, $right);
echo '区間 [left, right) の総和: ' . ($sum[$right] - $sum[$left]) . PHP_EOL;

// 区間 [left, right] の総和を求める
echo '区間 [left, right] の総和: ' . ($sum[$right + 1] - $sum[$left]) . PHP_EOL;
