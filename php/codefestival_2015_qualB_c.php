<?php

list($n, $m) = ints();
$a = ints();
$b = ints();
sort($a);
sort($b);
for ($i = 0, $j = 0; $i < $m; ++$i) {
    while ($b[$i] > $a[$j]) {
        ++$j;
        if ($j >= $n) {
            exit('NO' . PHP_EOL);
        }
    }
    ++$j;
}
echo 'YES' . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
