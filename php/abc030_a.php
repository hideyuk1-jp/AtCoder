<?php
list($a, $b, $c, $d) = ints();
if ($b / $a > $d / $c) echo 'TAKAHASHI';
elseif ($b / $a < $d / $c) echo 'AOKI';
else echo 'DRAW';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
