<?php
list($N) = ints();
$exist = false;
// K 個の部分集合の組があるとすると、各部分集合の要素数は K-1 個（自分以外の部分集合と1個ずつ数字を共有するため）
for ($K = 1; $K * ($K - 1) <= 2 * $N; ++$K) {
    if ($K * ($K - 1) === 2 * $N) {
        $exist = true;
        break;
    }
}
if (!$exist) exit('No');
echo 'Yes' . PHP_EOL;
echo $K . PHP_EOL;
$n = 1;
for ($i = 0; $i < $K - 1; ++$i) {
    for ($j = $i + 1; $j < $K; ++$j) {
        $s[$i][] = $n;
        $s[$j][] = $n;
        ++$n;
    }
}
for ($i = 0; $i < $K; ++$i)
    echo count($s[$i]) . ' ' . implode(' ', $s[$i]) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
