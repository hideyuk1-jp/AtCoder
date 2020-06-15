<?php
list($k) = ints();
$a = array_fill(0, $k, $k);
if ($k === 0) {
    echo (2) . PHP_EOL;
    echo (1) . ' ' . (1);
    exit;
}
if ($k === 1) {
    echo (2) . PHP_EOL;
    echo (0) . ' ' . (2);
    exit;
}
echo $k . PHP_EOL;
echo implode(' ', $a);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
