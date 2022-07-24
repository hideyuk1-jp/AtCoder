<?php

list($n) = ints();
$a = ints();
for ($i = 0; $i < $n; ++$i) {
    for ($j = $a[$i] - 1; $j <= $a[$i] + 1; ++$j) {
        if (isset($cnt[$j])) {
            $cnt[$j]++;
        } else {
            $cnt[$j] = 1;
        }
    }
}
echo max($cnt);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
