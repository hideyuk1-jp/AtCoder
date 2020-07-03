<?php
list($n) = ints();
$a = ints();
$cntOdd = 0;
for ($i = 0; $i < $n; ++$i)
    if ($a[$i] % 2) ++$cntOdd;
echo 3 ** $n - 2 ** ($n - $cntOdd);
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
