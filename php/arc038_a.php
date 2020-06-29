<?php
list($n) = ints();
$a = ints();
rsort($a);
$ans = 0;
for ($i = 0; $i < $n; $i += 2) $ans += $a[$i];
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
