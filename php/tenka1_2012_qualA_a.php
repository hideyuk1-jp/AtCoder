<?php
list($n) = ints();
$a[0] = 1;
for ($i = 1; $i <= $n; ++$i)
    $a[$i] = $a[$i - 1] + ($a[$i - 2] ?? 0);
echo $a[$n] . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
