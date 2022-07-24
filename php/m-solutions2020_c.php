<?php

list($n, $k) = ints();
$a = ints();
for ($i = $k; $i < $n; ++$i) {
    if ($a[$i] > $a[$i - $k]) {
        $ans[] = 'Yes';
    } else {
        $ans[] = 'No';
    }
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
