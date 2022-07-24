<?php

list($a, $b, $c) = ints();
if ($a + $b !== $c && $a - $b !== $c) {
    exit('!' . PHP_EOL);
}
if ($a + $b === $c && $a - $b === $c) {
    exit('?' . PHP_EOL);
}
if ($a + $b === $c) {
    exit('+' . PHP_EOL);
}
if ($a - $b === $c) {
    exit('-' . PHP_EOL);
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
