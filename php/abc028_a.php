<?php

list($n) = ints();
if ($n <= 59) {
    echo 'Bad';
} elseif ($n <= 89) {
    echo 'Good';
} elseif ($n <= 99) {
    echo 'Great';
} else {
    echo 'Perfect';
}
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
