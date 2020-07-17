<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a) = ints();
    if ($i > 0) {
        if ($a === $pre) $ans[] = 'stay';
        elseif ($a < $pre) $ans[] = 'down ' . abs($a - $pre);
        else $ans[] = 'up ' . abs($a - $pre);
    }
    $pre = $a;
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
