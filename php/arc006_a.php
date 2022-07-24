<?php

$e = ints();
list($b) = ints();
$l = ints();
$diff = array_diff($l, $e);
if (count($diff) === 0) {
    echo '1';
} elseif (count($diff) === 1) {
    if (array_pop($diff) === $b) {
        echo '2';
    } else {
        echo '3';
    }
} elseif (count($diff) === 2) {
    echo '4';
} elseif (count($diff) === 3) {
    echo '5';
} else {
    echo '0';
}
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
