<?php

list($n, $k) = ints();
$ans = 1 / $n * 1 / $n * 1 / $n; // k k k
$ans += 3 * ($k - 1) / $n * 1 / $n * 1 / $n; // k未満 k k
$ans += 3 * 1 / $n * 1 / $n * ($n - $k) / $n; // k k k超える
$ans += 6 * ($k - 1) / $n * 1 / $n * ($n - $k) / $n; // k未満 k k越える
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
