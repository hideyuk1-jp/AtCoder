<?php

list($n) = ints();
$a = ints();
$ans = 0;
for ($l = $r = 0; $l < $n; ++$l) {
    $r = max($l, $r);
    while ($r < $n && !isset($cnt[$a[$r]])) {
        $cnt[$a[$r]] = true;
        ++$r;
    }
    unset($cnt[$a[$l]]);
    $ans = max($ans, $r - $l);
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
