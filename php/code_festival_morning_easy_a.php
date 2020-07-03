<?php
list($n) = ints();
$a = ints();
$sumd = 0;
for ($i = 0; $i < $n - 1; ++$i) $sumd += $a[$i + 1] - $a[$i];
echo ($sumd / ($n - 1)) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
