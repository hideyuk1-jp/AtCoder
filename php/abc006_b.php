<?php
define('MOD', 10 ** 4 + 7);
list($n) = ints();
$a = [0, 0, 1];
$i = 3;
for ($i = 3; $i < $n; ++$i) $a[$i] = ($a[$i - 1] + $a[$i - 2] + $a[$i - 3]) % MOD;
echo $a[$n - 1] . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
