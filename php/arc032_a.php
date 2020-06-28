<?php
list($n) = ints();
echo isPrime(($n + 1) * $n / 2) ? 'WANWAN' : 'BOWWOW';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
// 素数判定（試し割り）
function isPrime($n)
{
    if ($n === 1) return false;
    $rmax = (int) floor(sqrt($n));
    for ($i = 2; $i <= $rmax; $i++) {
        if ($n % $i === 0) return false;
    }
    return true;
}
