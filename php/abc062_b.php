<?php

list($h, $w) = ints();
echo str_repeat('#', $w + 2) . PHP_EOL;
for ($i = 0; $i < $h; ++$i) {
    $a = strs();
    echo '#' . implode('', $a) . '#' . PHP_EOL;
}
echo str_repeat('#', $w + 2) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
