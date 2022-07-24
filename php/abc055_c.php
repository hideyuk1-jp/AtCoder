<?php

list($n, $m) = ints();
if ($m <= $n * 2) {
    exit((string) intdiv($m, 2));
}
echo $n + intdiv($m - $n * 2, 4);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
