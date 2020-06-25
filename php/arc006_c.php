<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($w) = ints();
    if ($i === 0) {
        $c[0] = $w;
        continue;
    }
    sort($c);
    foreach ($c as $j => $v) {
        if ($w <= $v) {
            $c[$j] = $w;
            continue 2;
        }
    }
    $c[count($c)] = $w;
}
echo count($c) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
