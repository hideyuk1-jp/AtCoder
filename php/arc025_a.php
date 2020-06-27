<?php
$d = ints();
$j = ints();
for ($i = $ans = 0; $i < 7; ++$i) $ans += max($d[$i], $j[$i]);
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
