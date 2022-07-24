<?php

list($n) = ints();
$ans = [];
for ($i = $n - 9 * 17; $i <= $n - 1; ++$i) {
    if ($i + digitSum($i) === $n) {
        $ans[] = $i;
    }
}
echo count($ans) . PHP_EOL;
if (count($ans) > 0) {
    echo implode(PHP_EOL, $ans);
    echo PHP_EOL;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function digitSum($n)
{
    return array_sum(array_map('intval', str_split((string) $n)));
}
