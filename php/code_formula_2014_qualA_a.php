<?php

list($n) = ints();
for ($i = 1; $i <= 100; ++$i) {
    if ($i ** 3 === $n) {
        exit('YES' . PHP_EOL);
    }
}
echo 'NO' . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
