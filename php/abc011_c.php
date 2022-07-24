<?php

list($n) = ints();
for ($i = 0; $i < 3; ++$i) {
    list($ngs) = ints();
    $ng[$ngs] = true;
}
if (isset($ng[$n])) {
    exit('NO' . PHP_EOL);
}
$c = 0;
for ($i = 0; $i < 100; ++$i) {
    if ($c + 3 >= $n) {
        break;
    }
    for ($j = 3; $j >= 1; --$j) {
        if (!isset($ng[$c + $j])) {
            $c += $j;
            continue 2;
        }
    }
    exit('NO' . PHP_EOL);
}
echo $i < 100 ? 'YES' : 'NO';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
