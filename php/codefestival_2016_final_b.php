<?php

list($n) = ints();
$sum = 0;
for ($i = 1; $i <= $n; ++$i) {
    $sum += $i;
    $ans[] = $i;
    if ($sum >= $n) {
        $diff = $sum - $n;
        if ($diff) {
            unset($ans[array_search($diff, $ans)]);
        }
        break;
    }
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
