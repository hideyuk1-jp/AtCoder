<?php

list($a, $b) = ints();
$cnt = 0;
for ($i = $a; $i <= $b; $i++) {
    $s = strval($i);
    if ($s[0] === $s[4] && $s[1] === $s[3]) {
        $cnt++;
    }
}
echo $cnt;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
