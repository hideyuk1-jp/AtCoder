<?php
list($n) = ints();
$l[0] = 2;
$l[1] = 1;
for ($i = 2; $i <= $n; ++$i) $l[$i] = $l[$i - 2] + $l[$i - 1];
echo $l[$n];

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
