<?php
list($n, $y) = ints();
for ($i = 0; $i <= $n; $i++) {
    if ($i * 10000 > $y) break;
    for ($j = 0; $j <= $n - $i; $j++) {
        if ($i * 10000 + $j * 5000 > $y) break;
        $k = $n - $i - $j;
        if ($k * 1000 === $y - ($i * 10000 + $j * 5000)) {
            echo "{$i} {$j} {$k}";
            exit;
        }
    }
}
echo '-1 -1 -1';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
