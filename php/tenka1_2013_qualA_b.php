<?php
for ($i = 0; $i < 15; ++$i) list($s[]) = strs();
natsort($s);
$s = array_values($s);
echo $s[6] . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
