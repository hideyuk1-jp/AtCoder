<?php

[$x, $y] = ints();
if ($x === $y) {
    echo $x;
    exit;
}
for ($i = 0; $i < 3; $i++) {
    if ($x !== $i && $y !== $i) {
        echo $i;
        exit;
    }
}

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
