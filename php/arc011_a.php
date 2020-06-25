<?php
list($m, $n, $N) = ints();
$ans = $N;
while ($N >= $m) {
    $ans += intdiv($N, $m) * $n;
    $N = $N % $m + intdiv($N, $m) * $n;
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
