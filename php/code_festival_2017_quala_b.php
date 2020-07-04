<?php
list($n, $m, $k) = ints();
for ($i = 0; $i <= $n; ++$i) {
    for ($j = 0; $j <= $m; ++$j) {
        $cnt = $i * $m + $j * $n - 2 * $i * $j;
        if ($cnt === $k) exit('Yes');
    }
}
echo 'No';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
