<?php

list($s) = strs();
list($t) = strs();
if ($s === $t) {
    echo 'same';
} elseif (strtolower($s) === strtolower($t)) {
    echo 'case-insensitive';
} else {
    echo 'different';
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
