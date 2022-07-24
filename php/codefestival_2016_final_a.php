<?php

list($h, $w) = ints();
for ($i = 0; $i < $h; ++$i) {
    $s = strs();
    $j = array_search('snuke', $s);
    if ($j !== false) {
        $ans = chr(65 + $j) . ($i + 1);
    }
}
echo $ans . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
