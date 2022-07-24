<?php

list($s) = strs();
foreach (['A', 'B', 'C', 'D', 'E', 'F'] as $v) {
    $cnt[$v] = 0;
}
for ($i = 0; $i < strlen($s); ++$i) {
    ++$cnt[$s[$i]];
}
echo implode(' ', $cnt) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
