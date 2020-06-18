<?php
list($l, $h) = ints();
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a) = ints();
    if ($a < $l) $ans[] = $l - $a;
    elseif ($a > $h) $ans[] = -1;
    else $ans[] = 0;
}
echo implode(PHP_EOL, $ans);
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
