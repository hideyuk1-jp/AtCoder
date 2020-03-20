<?php
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));

// 累積和
$cusum = cusum($a);
echo implode(' ', $cusum) . PHP_EOL;

// 区間 [left, right) の総和を求める
fscanf(STDIN, '%d %d', $left, $right);
echo '区間 [left, right) の総和: ' . ($cusum[$right] - $cusum[$left]) . PHP_EOL;

// 区間 [left, right] の総和を求める
echo '区間 [left, right] の総和: ' . ($cusum[$right + 1] - $cusum[$left]) . PHP_EOL;

// 累積和
function cusum($a)
{
    $n = count($a);
    $res = array_fill(0, $n + 1, 0);
    for ($i = 0; $i < $n; $i++) {
        $res[$i + 1] = $res[$i] + $a[$i];
    }
    return $res;
}
