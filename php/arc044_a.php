<?php

list($n) = ints();
if (isPrime($n)) {
    exit('Prime' . PHP_EOL);
}
if ($n === 1 || $n % 2 === 0 || $n % 5 === 0) {
    exit('Not Prime' . PHP_EOL);
}
if (digitSum($n) % 3 === 0) {
    exit('Not Prime' . PHP_EOL);
}
echo 'Prime' . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
// 素数判定（試し割り）
function isPrime($n)
{
    if ($n === 1) {
        return false;
    }
    $rmax = (int) floor(sqrt($n));
    for ($i = 2; $i <= $rmax; $i++) {
        if ($n % $i === 0) {
            return false;
        }
    }
    return true;
}
function digitSum($n)
{
    return array_sum(array_map('intval', str_split((string) $n)));
}
