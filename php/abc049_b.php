<?php
list($h, $w) = ints();
for ($i = 0; $i < $h; ++$i) {
    list($s) = strs();
    echo $s . PHP_EOL . $s . PHP_EOL;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
