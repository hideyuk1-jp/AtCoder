<?php

list($a, $b) = ints();
if ($a + $b === 15) {
    echo '+';
} elseif ($a * $b === 15) {
    echo '*';
} else {
    echo 'x';
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
