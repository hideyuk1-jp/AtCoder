<?php

[$n] = ints();
$a = ints();
$cnt = 0;
for ($i = 0; $i < $n; $i++) {
    $cnt += max($a[$i] - 10, 0);
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
