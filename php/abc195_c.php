<?php
[$n] = ints();
$cnt = 0;
$x = 10 ** 3;
while ($n >= $x) {
    $cnt += $n - $x + 1;
    $x *= 10 ** 3;
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
