<?php

list($k, $a, $b) = ints();
if ($b - $a <= 2) {
    exit((string) ($k + 1));
}
echo 1 + min($k, $a - 1) + intdiv($k - min($k, $a - 1), 2) * ($b - $a) + ($k - min($k, $a - 1)) % 2;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
