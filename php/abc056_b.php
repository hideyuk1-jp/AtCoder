<?php

list($w, $a, $b) = ints();
if ($b > $a + $w) {
    echo $b - ($a + $w);
} elseif ($a > $b + $w) {
    echo $a - ($b + $w);
} else {
    echo '0';
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
