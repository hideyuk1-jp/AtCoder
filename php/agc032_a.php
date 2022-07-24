<?php

list($n) = ints();
$b = ints();
while (count($b) > 0) {
    for ($i = count($b) - 1; $i >= 0; --$i) {
        if ($i + 1 === $b[$i]) {
            $a[] = $b[$i];
            unset($b[$i]);
            $b = array_values($b);
            continue 2;
        }
    }
    exit('-1');
}
echo implode(PHP_EOL, array_reverse($a));
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
