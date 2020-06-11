<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    $f[] = bindec(implode('', ints()));
}
for ($i = 0; $i < $n; ++$i) $p[] = ints();
$ans = PHP_INT_MIN;
// bit全探索
for ($i = 0; $i < 2 ** 10; ++$i) {
    $cnt = array_fill(0, $n, 0);
    if (digitSum(decbin($i)) < 1) continue;
    for ($k = 0; $k < $n; ++$k) $cnt[$k] = digitSum(decbin($i & $f[$k]));
    $psum = 0;
    for ($k = 0; $k < $n; ++$k) $psum += $p[$k][$cnt[$k]];
    $ans = max($ans, $psum);
}
echo $ans;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

function digitSum($n)
{
    return array_sum(array_map('intval', str_split((string) $n)));
}
