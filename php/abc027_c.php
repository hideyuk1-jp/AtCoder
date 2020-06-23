<?php
list($n) = ints();
$k = 0;
while ($n > 1) {
    $n = $k % 2 ? intdiv($n, 2) : intdiv($n, 2) - 1;
    ++$k;
}
echo $k % 2 ? 'Takahashi' : 'Aoki';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
