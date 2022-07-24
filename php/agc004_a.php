<?php

$a = ints();
sort($a);
$isOdd = true;
for ($i = 0; $i < 3; ++$i) {
    if ($a[$i] % 2 === 0) {
        $isOdd = false;
    }
}
echo $isOdd ? $a[0] * $a[1] : 0;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
