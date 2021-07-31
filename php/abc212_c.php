<?php
[$n, $m] = ints();
$a = ints();
$b = ints();
$arr = [];
for ($i = 0; $i < $n; ++$i) {
    $arr[$a[$i]] = 1;
}
for ($i = 0; $i < $m; ++$i) {
    if (isset($arr[$b[$i]]) && $arr[$b[$i]] === 1) {
        exit('0');
    }
    $arr[$b[$i]] = 2;
}
$pre = -10 ** 9;
$prev = -1;
$min = PHP_INT_MAX;
ksort($arr);
foreach ($arr as $num => $v) {
    if ($prev !== $v) {
        $min = min(abs($num - $pre), $min);
    }
    $pre = $num;
    $prev = $v;
}
echo $min;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
